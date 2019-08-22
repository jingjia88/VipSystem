<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    //
    public function index()
    {
        return view('admin/mail');
    }

    public function send()
    {
        //$content = SELECT "mailcontent" FROM "mail";
        Mail::raw($content, function($message)
        { 
            $message->to('kejyun@gmail.com');
        });
        return view(admin/mailsuccess);
    }
    public function sendsms()
    {

    }
}
