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
          <div class="panel-heading"><a href="{{ url('admin/add') }}" class="btn btn-lg btn-primary">新增</a></div>
          <div class="panel-body">
          <table id="mytable" style="line-height:40px;" border="2" >
                  <tr>
                    <th scope="col" style="width:200px"></th>
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
                        <a href="{{ url('admin/'.$member->id.'/edit') }}" class="btn btn-primary">編輯</a>
                        <form action="{{ url('admin/'.$member->id) }}" method="POST" style="display: inline;">
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
                <div style="float:right;">{!! $members->links() !!}</div> 
                </div>
            </div>
        </div>
    </div>
</div>


@endsection