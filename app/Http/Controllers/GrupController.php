<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Grup;
use App\Models\GrupUser;

class GrupController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $GrupUser = GrupUser::with('grup')->where(['user_id' => Auth::user()->id])->get();
        // print_r($GrupUser); die();
        return view('grup.index', compact('GrupUser'));
    }

    public function create()
    {
        return view('grup.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_grup' => 'required|min:3|max:150',
            'deskripsi' => 'required|min:3|max:250',
        ]);

        $data = new Grup();
        $data->nama_grup = $request->nama_grup;
        $data->user_id = Auth::user()->id;
        $data->deskripsi = $request->deskripsi;
        // $data->save();
        if($data->save()){
            $GrupUser = new GrupUser();
            $GrupUser->grub_id = $data->id;
            $GrupUser->user_id = Auth::user()->id;
            $GrupUser->save();
        }

        return redirect()->route('grup');
    }

    public function getGrup()
    {
        return GrupUser::with('grup')->where(['user_id' => Auth::user()->id])->get();
    }
}
