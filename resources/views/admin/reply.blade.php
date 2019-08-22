@extends('layouts.app')

@section('content')
<div class="container"  style="margin-left: 100px; ">
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default"  >
                <div class="panel-body">
                    <a href="{{ url('admin') }}" class="btn btn-lg btn-success col-xs-12">會員管理</a>
                </div>
                <div class="panel-body">
                    <a href="{{ url('admin/group') }}" class="btn btn-lg btn-success col-xs-12">群組管理</a>
                </div>
                <div class="panel-body">
                    <a href="{{ url('admin/mail') }}" class="btn btn-lg btn-success col-xs-12">寄送通知</a>
                </div>
                <div class="panel-body">
                    <a href="{{ url('admin/reply') }}" class="btn btn-lg btn-success col-xs-12">回覆管理</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-left: 510px; ">
會員群組表

<table id="mytable" border="1" >
  <tr>
    <th scope="col" abbr="Configurations">group</th>
    <th scope="col" abbr="Dual 1.8">name</th>
    <th scope="col" abbr="Dual 2">cellphone</th>
    <th scope="col" abbr="Dual 2">email</th>
    <th scope="col" abbr="Dual 2">company</th>
  </tr>
  <tr>
    <th scope="row">mna</th>
    <td>www.865171.cn</td>
    <td>www.865171.cn</td>
    <th scope="col" abbr="Dual 2">email</th>
    <th scope="col" abbr="Dual 2">company</th>
  </tr>
  <tr>
    <th scope="row">mna</th>
    <td class="alt">mna</td>
    <td class="alt">mna</td>
    <th scope="col" abbr="Dual 2">mna</th>
    <th scope="col" abbr="Dual 2">mna</th>
  </tr>
  <tr>
    <th scope="row">mna</th>
    <td>www.865171.cn</td>
    <td>www.865171.cn</td>
    <th scope="col" abbr="Dual 2">mna</th>
    <th scope="col" abbr="Dual 2">mna</th>
  </tr>
</table></div>

@endsection