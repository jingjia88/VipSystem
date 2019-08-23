<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use DB;
use App\Group;
class GroupController extends Controller
{
    //
    public function index()
    {
        $groups = DB::table('groups')->groupBy('name')->paginate(10);
        return view('admin/group')->with('groups',$groups);
    }
    public function create()
    {
        return view('admin/group/add')->with('members',\App\Member::paginate(5));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $members = $request->input('member');
        foreach($members as $member){
            $group = new Group;
            $group->name = $request->get('name');
            $group->user = $member;
        
            if (!$group->save()) {
                return redirect()->back()->withInput()->withErrors('保存失败！');
            } 
        }

        return redirect('admin/group');
    }
    public function edit($name)
    {
        $groups = Group::where('name',$name)->member();
        
        return view('admin/group/edit')->with('members',$groups);
    }
    public function update()
    {

    }
    public function destroy($name)
    {
        Group::where('name',$name)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
    public function find(Request $request)
    {
        $members = DB::table('members')->where('name', $request->get('search'))->paginate(10);
        return view('admin/group/find')->with('members',$members);
    }
}
