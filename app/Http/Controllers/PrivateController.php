<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\UserChat;
use App\Models\StatusChat;
use App\Models\User;
use App\Events\PrivateEvent;

class PrivateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Users = User::orderBy('name', 'asc')->whereNotIn('id', [Auth::user()->id])->get();
        // print_r($User); die();
        return view('private.index', compact('Users'));
    }

    public function chat($id)
    {
        $Users = User::orderBy('name', 'asc')->whereNotIn('id', [Auth::user()->id])->get();
        $User = User::where(['id' => $id])->first();
        // print_r($User); die();
        return view('private.chat', compact('User'));
    }

    public function getPrivateChat($id)
    {
        // return UserChat::with('user', 'usertujuan')->where(['user_id_tujuan' => $id, 'user_id' => Auth::user()->id])->orderBy('id', 'desc')->get();
        $iduser = [$id, Auth::user()->id];
        return UserChat::with('user', 'usertujuan')
                        ->whereIn('user_id_tujuan', $iduser)
                        ->whereIn('user_id', $iduser)
                        ->orderBy('id', 'desc')->get();
    }

    public function getUser()
    {
        return User::orderBy('name', 'asc')->whereNotIn('id', [Auth::user()->id])->get();
    }

    public function postPrivateChat(Request $request)
    {
        $UserChat =  UserChat::create([
            'chat' => $request->chat,
            'user_id_tujuan' => $request->user_id_tujuan,
            'user_id' => Auth::user()->id,
            'status' => 0
        ]);

        // $GrupUserChat->load('user');

        broadcast(new PrivateEvent($UserChat))->toOthers();

        // event(new GrupEvent($GrupUserChat));


        return $UserChat;
    }

    public function postStatusChat(Request $request)
    {
        return StatusChat::create([
            'status' => $request->status,
            'user_id_tujuan' => $request->user_id_tujuan,
            'user_id' => Auth::user()->id
        ]);

        // $GrupUserChat->load('user');

        // broadcast(new PrivateEvent($UserChat))->toOthers();

        // event(new GrupEvent($GrupUserChat));


        // return $UserChat;
    }
}
