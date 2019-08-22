<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Member;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin/home')->with('members',\App\Member::paginate(10));
    }
    public function add()
    {
        return view('admin/member/add');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
    
        $member = new Member;
        $member->name = $request->get('name');
        $member->email = $request->get('email');
        $member->phone = $request->get('phone');
        $member->identity = $request->get('identity');
        $member->company = $request->get('company');
    
        if ($member->save()) {
            return redirect('admin');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }
    public function delete($id)
    {
        Member::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
    public function edit($id)
    {
        $member = Member::find($id);
        return view('admin/member/edit')->with('member',$member);
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
    
        $member = Member::find($id);
        $member->name = $request->get('name');
        $member->email = $request->get('email');
        $member->phone = $request->get('phone');
        $member->identity = $request->get('identity');
        $member->company = $request->get('company');
    
        if ($member->save()) {
            return redirect('admin');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }
}
