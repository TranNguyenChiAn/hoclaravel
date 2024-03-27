<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index() {
        $mailData = [
            'title' => 'Reset password',
            'body' => 'This is for Demo'

        ];

        Mail::to('trantranchian.dev@gmail.com')->send(new SendMail($mailData));
        dd('Email send successfully');
    }
}
