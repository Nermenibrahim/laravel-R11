<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\SampleMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function store (Request $request)
    {
        $data = $request->validate([
            'Name' => 'required|string',
            'email' => 'required|email',
            'subject' =>'required|string|max:200',
            'message' =>'required|string|max:300',
         ]);

        Mail::to('nermenibrahim34@gmail.com')->send(new SampleMail($data));
        

        return "Email has been sent.";
    }
}
