<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    //
    public function index()
    {
        return view('admin/group')->with('groups',\App\Group::paginate(10));
    }
    public function create()
    {
        return view('admin/group/add')->with('members',\App\Member::paginate(5));
    }
    public function store()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }
}
