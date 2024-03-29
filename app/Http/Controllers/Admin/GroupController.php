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
        //delete the same data
        $groups = DB::table('groups')->get();
        foreach($groups as $group){
            if(App\Member::find($group->user)==null){
                Group::where('name',$group->name)->where('user',$group->user)->delete();
            }
        }
        
        //count number of member in group
        $groupname = DB::table('groups')->groupBy('name')->get();
        $params=null;
        foreach($groupname as $gp){
            $params[] = [
                'name' => $gp->name,
                'count' => Group::where('name',$gp->name)->count(),
                'created_at' => $gp->created_at
            ];
        }
        
        return view('admin/group')->with('groups',$params);
    }
    public function create(Request $request)
    {
        $members = DB::table('members')->get();
        return view('admin/group/add')->with('members',$members);
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

        return redirect()->back()->withInput();
    }
    public function edit($name)
    {
        $groups = Group::where('name',$name)->get();
        $members=null;
        foreach($groups as $group){
            $members[]=App\Member::find($group->user);
        }
        if($members==null){
            $groups = DB::table('groups')->groupBy('name')->paginate(10);
            return view('admin/group')->with('groups',$groups);
        }  
        $all_members = DB::table('members')->get();
        return view('admin/group/edit')->with('members',$members)->with('name',$name)->with('all',$all_members);
    }
    public function delete($name,$id)
    {
        Group::where('name',$name)->where('user',$id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
    public function destroy($name)
    {
        Group::where('name',$name)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
    public function find(Request $request)
    {
        $members = DB::table('members')->where('name', $request->get('search'))->get();
        return view('admin/group/find')->with('members',$members);
    }
}
