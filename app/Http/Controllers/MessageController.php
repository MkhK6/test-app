<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $flights = new Message();
        $flights->author = $request->author;
        $flights->message = $request->message;
        $flights->save();
        return $request;
    }

    public function getMessages(Request $request)
    {
        $count = Message::count();
        $data = Message::offset($request->offset)->take(3)->get();
        return $data;
    }

    public function getCountMessages(Request $request)
    {
        $count = Message::count();
        return $count;
    }
}
