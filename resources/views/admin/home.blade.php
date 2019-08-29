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
                <!-- <div class="panel-body">
                    <a href="{{ url('admin/reply') }}" class="btn btn-lg btn-success col-xs-12">回覆管理</a>
                </div> -->
            </div>
        </div>
    <div class="col-md-8 col-md-offset">
    
    <h2> 會員資料表 </h2> 
    
    <div class="panel panel-default"  >
          <div class="panel-heading">
            <a href="{{ url('admin/add') }}" class="btn btn-lg btn-primary">新增</a><br>
            <hr>
            <form action="{{ url('admin/group/import') }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                {{ csrf_field() }}
                <span style="font-size:16px;">匯入: </span>
                <input type="file" name="excel" style="display: inline;" required="required" >
                <button type="submit" class="btn btn-primary">確認匯入</button>
            </form>
          </div>
          <div class="panel-body" style="height:560px;  overflow-y:hidden; overflow-x:auto;">
          <table id="mytable" style="line-height:40px; min-width:1600px; " border="2" >
                  <tr>
                  <th scope="col" style="width:150px"></th>
                    <th scope="col" style="width:30px">ID</th>
                    <th scope="col" style="width:80px">行業別</th>
                    <th scope="col" style="width:80px">公司</th>
                    <th scope="col" style="width:80px">中文姓名</th>
                    <th scope="col" style="width:80px">英文姓名</th>
                    <th scope="col" style="width:80px">職稱</th>
                    <th scope="col" style="width:80px">部門</th>
                    <th scope="col" style="width:250px">地址</th>
                    <th scope="col" style="width:80px">公司電話</th>
                    <th scope="col" style="width:80px">手機</th>
                    <th scope="col" style="width:250px">電子信箱</th>
                    <th scope="col" style="width:80px">聯絡人姓名</th>
                    <th scope="col" style="width:80px">聯絡人電話</th>
                    <th scope="col" style="width:250px">聯絡人電子信箱</th>
                  </tr>
                  @foreach ($members as $member)
                  <tr>
                    <td>
                        <a href="{{ url('admin/'.$member->id.'/edit') }}" class="btn btn-primary">編輯</a>
                        <form action="{{ url('admin/'.$member->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
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
                <div style="float:right;">{!! $members->links() !!}</div> 
                </div>
            </div>
        </div>
    </div>
</div>


@endsection