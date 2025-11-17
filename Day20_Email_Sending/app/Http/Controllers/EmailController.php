<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $toEmail = 'anything@example.com';
        $message = 'Hello, Welcome to our website';
        $subject = 'Reset Your Password';

        $request = Mail::to($toEmail)->send(new welcomeemail($message, $subject));

        dd($request);
    }
}
