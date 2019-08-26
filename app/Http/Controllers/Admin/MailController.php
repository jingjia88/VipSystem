<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\Notice;
use App;
use DB;
class MailController extends Controller
{
    //
    public function index()
    {
        $groups = DB::table('groups')->groupBy('name')->get();
        return view('admin/mail')->with('groups',$groups);
    }

    public function send(Request $request)
    {
        $groups = App\Group::where('name',$request->groupname)->get();
        foreach($groups as $group){
            $member= App\Member::find($group->user);
            $to = collect([
                ['name' => $member->name, 'email' => $member->email ]
            ]);
     
            // 提供給模板的參數
            $params = [
                'say' => $member->name.'您好'.$request->body,
                'title' => $request->title
            ];
    
            Mail::to($to)->send(new Notice($params));
        }
        $groups = DB::table('groups')->groupBy('name')->get();
        return view('admin/mail')->with('groups',$groups); 
        //$content = SELECT "mailcontent" FROM "mail";
        // Mail::raw($content, function($message)
        // { 
        //     $message->to('kejyun@gmail.com');
        // });
        // return view(admin/mailsuccess);
    }
    public function sendsms()
    {

    }
}
