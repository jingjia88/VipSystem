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
        $member->industry =$request->get('industry');
        $member->company =$request->get('company');
        $member->name =$request->get('name');
        $member->ename =$request->get('ename');
        $member->identity =$request->get('identity');
        $member->pr =$request->get('pr');
        $member->addr =$request->get('addr');
        $member->companyphone =$request->get('companyphone');
        $member->phone =$request->get('phone');
        $member->email =$request->get('email');
        $member->conname =$request->get('conname');
        $member->conphone =$request->get('conphone');
        $member->conemail=$request->get('conemail');

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
    public function import(Request $request){
        dd($request->excel);
        // Excel::load($filePath, function($reader) {
        //     $data = $reader->all();
        //     dd($data);
        // });
    }
}
