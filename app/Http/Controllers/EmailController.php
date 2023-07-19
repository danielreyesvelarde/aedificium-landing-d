<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request)
    {

        $contact = $request->all();

        Mail::to(config('app.email_to'))->send(new contactMail($contact));

        return back();
    }
}
