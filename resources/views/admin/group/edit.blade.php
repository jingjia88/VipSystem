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
    
    <h2> 編輯群組 </h2> 
    
    <div class="panel panel-default"  >
        <div class="panel-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>編輯失败</strong> 输入不符合要求<br><br>
                    {!! implode('<br>', $errors->all()) !!}
                </div>
            @endif

            <h4>群組名稱：</h4>
            <input type="text" name="name" class="form-control" required="required">
            
            <h4>會員名單：</h4>
            <table id="table1" style="line-height:40px;" border="2" >
                <tr>
                <th scope="col" style="width:100px"></th>
                <th scope="col" style="width:30px">ID</th>
                <th scope="col" style="width:60px">姓名</th>
                <th scope="col" style="width:60px">電話號碼</th>
                <th scope="col" style="width:100px">職位</th>
                <th scope="col" style="width:250px">email</th>
                <th scope="col" style="width:150px">公司</th>
                </tr>
                @foreach ($members as $member)
                <tr>
                <td>
                  <form action="{{ url('admin/group/'.$group->name) }}" method="POST" style="display: inline;">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger">删除</button>
                  </form>
                </td>
                
                <td>{{ $member->id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->phone }}</td>
                <td>{{ $member->identity }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->company }}<td>
                </tr>
                @endforeach
            </table>

            <h4>關鍵字搜索：</h4>
            <form action="{{ url('admin/group/find') }}" method="POST">
                {!! csrf_field() !!}
                <input type="search" id="search" style="width:500px" name="search" required="required" placeholder="Search..." />
                <button class="btn btn-lg btn-info">搜索</button>
            </form>
        </div>
    </div>
    </div>
</div>



@endsection