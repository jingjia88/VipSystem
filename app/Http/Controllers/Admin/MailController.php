<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\Notice;
use App\Group;
use App\Member;
use App;
use DB;
class MailController extends Controller
{
    //
    public function index()
    {
        $members = DB::table('members')->get();
        return view('admin/mail')->with('members',$members);
    }

    public function send(Request $request)
    {
        try {  
            $members = $request->input('member');
            foreach($members as $id){
                $member = Member::find($id);
                if($member->email!=null){
                    $to = collect([
                        ['name' => $member->name, 'email' => $member->email ]
                    ]);
            
                    // 提供給模板的參數
                    $params = [
                        'say' => $member->name.$member->identity.'您好'.$request->body,
                        'title' => $request->title
                    ];
                
                    config(['mail.username' => $request->username ]);
                    config(['mail.password' => $request->pwd ]);
                    Mail::to($to)->send(new Notice($params));
                }
             }
        
        } catch (\Exception $e) {  
            return redirect()->back()->withInput()->withErrors('輸入錯誤！請檢查您的帳號密碼');
        }  
        
        
        $members = DB::table('members')->get();
        return view('admin/mail')->with('members',$members);
    }
    public function sendsms()
    {

    }
}
