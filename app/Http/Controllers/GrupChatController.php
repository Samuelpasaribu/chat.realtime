<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Grup;
use App\Models\GrupUser;
use App\Models\GrupUserChat;
use App\Events\GrupEvent;
use App\Models\User;

class GrupChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $Grup = Grup::where(['id' => $id])->first();

        // print_r($Grup); die();

        return view('grup-chat.index', compact('Grup'));

        // var_dump( \App\Models\GrupUser::where(['grup_id' => 8])->select('user_id'));

        // return \App\Models\GrupUser::where(['grup_id' => 8])->hasUser(111);

        

    }

    public function getGrupChat($id)
    {
        return GrupUserChat::with('user')->where(['grub_id' => $id])->orderBy('id', 'desc')->get();
    }

    public function postGrupChat(Request $request)
    {
        $GrupUserChat =  GrupUserChat::create([
            'chat' => $request->chat,
            'grub_id' => $request->grup_id,
            'user_id' => Auth::user()->id
        ]);

        // $GrupUserChat->load('user');

        broadcast(new GrupEvent($GrupUserChat))->toOthers();

        // event(new GrupEvent($GrupUserChat));


        return $GrupUserChat;
    }

    public function create($id)
    {
        $Grup = Grup::where(['id' => $id])->first();


        return view('grup-chat.create', compact('Grup'));

    }

    public function store(Request $request)
    {
        // dd($request->id_grup);
        $User = User::where(['email' => $request->email]);

        if(!$User->exists()){
            return back()->with('warning','Email Tidak Ditemukan!');
        }
    
        $data = new GrupUser();
        $data->grub_id = $request->id_grup;
        $data->user_id = $User->first()->id;
        $data->save();
     

        return redirect()->route('grup-chat', $request->id_grup);
    }
}
