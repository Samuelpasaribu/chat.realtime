<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('chat.index');
    }

    public function getMessage()
    {
        return Message::with('user')->orderBy('id', 'desc')->get();
    }

    public function postMessage(Request $request)
    {
        return Message::create([
            'subject' => $request->subject,
            'user_id' => Auth::user()->id
        ]);
    }
}
