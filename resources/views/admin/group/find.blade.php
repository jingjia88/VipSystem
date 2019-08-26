@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{{ URL::asset('css/checkbox.js') }}"></script>
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
                <!-- <div class="panel-body">
                    <a href="{{ url('admin/reply') }}" class="btn btn-lg btn-success col-xs-12">回覆管理</a>
                </div> -->
            </div>
        </div>
    <div class="col-md-8 col-md-offset">
    
    <h2> 新增群組 </h2> 
    
    <div class="panel panel-default"  >
        <div class="panel-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>新增失败</strong> 输入不符合要求<br><br>
                    {!! implode('<br>', $errors->all()) !!}
                </div>
            @endif

            <form action="{{ url('admin/group') }}" method="POST">
                {!! csrf_field() !!}
                <h4>群組名稱：</h4>
                <input type="text" name="name" class="form-control" required="required">
                
                <h4>會員名單：</h4>
                <table id="mytable" style="line-height:40px;" border="2" >
                  <tr>
                  <th scope="col" style="width:100px"></th>
                    <th scope="col" >ID</th>
                    <th scope="col" >行業別</th>
                    <th scope="col" >公司</th>
                    <th scope="col" >中文姓名</th>
                    <th scope="col" >英文姓名</th>
                    <th scope="col" >職稱</th>
                    <th scope="col" >部門</th>
                    <th scope="col" >地址</th>
                    <th scope="col" >公司電話</th>
                    <th scope="col" >手機</th>
                    <th scope="col" >電子信箱</th>
                    <th scope="col" >聯絡人姓名</th>
                    <th scope="col" >聯絡人電話</th>
                    <th scope="col" >聯絡人電子信箱</th>
                  </tr>
                  @foreach ($members as $member)
                  <tr>
                    <td><input type="checkbox" value="{{$member->id}}"  name="member[]"> 
                    </td>
                    
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->industry }}</td>
                    <td>{{ $member->company }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->ename }}</td>
                    <td>{{ $member->identity }}</td>
                    <td>{{ $member->pr }}</td>
                    <td>{{ $member->addr }}</td>
                    <td>{{ $member->companyphone }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->conname }}</td>
                    <td>{{ $member->conphone }}</td>
                    <td>{{ $member->conemail }}</td>
                  </tr>
                  @endforeach
                </table>
                
                <br>
                <button class="btn btn-lg btn-info">新增</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>



@endsection