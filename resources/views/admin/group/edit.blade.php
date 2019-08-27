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

            <h4>群組名稱： {{$name}}</h4>
            <div style="border: 1px solid;"></div>

            <h4>會員名單：</h4>
            <div class="panel-body" style="max-height:360px;  overflow-y:scroll; overflow-x:auto; ">
            <table id="table1" style="line-height:40px; min-width:1500px;" border="2" >
                <tr>
                <th scope="col" style="width:150px"></th>
                    <th scope="col" style="width:10px">ID</th>
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
                  <form action="{{ url('admin/group/'.$name.'/'.$member->id) }}" method="POST" style="display: inline;">
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
            </div>
            <h4>會員搜索：</h4>
            <input type="search" id="search" style="width:500px" name="q" required="required" placeholder="Search..." />
            <button id="query" onclick="search();" class="btn btn-lg btn-info">搜索</button>
            <button onclick="show_all();" class="btn btn-lg btn-info">all</button>
            
            <form action="{{ url('admin/group') }}" id="member_form" method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="name" class="form-control" value="{{$name}}">
                
                <div class="panel-body" style="max-height:360px;  overflow-y:scroll; overflow-x:auto; ">
                <table id="mytable" style="line-height:40px; min-width:1500px;" border="2" >
                  <tr id="table_title">
                  <th scope="col" style="width:50px"></th>
                    <th scope="col" style="width:20px">ID</th>
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
                  @foreach ($all as $person)
                  <tr name="{{ $person->name }}" class="{{ $person->industry }}">
                    <td><input type="checkbox" style="zoom: 2" value="{{$person->id}}"  name="member[]"> 
                    </td>
                    
                    <td>{{ $person->id }}</td>
                    <td>{{ $person->industry }}</td>
                    <td>{{ $person->company }}</td>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->ename }}</td>
                    <td>{{ $person->identity }}</td>
                    <td>{{ $person->pr }}</td>
                    <td>{{ $person->addr }}</td>
                    <td>{{ $person->companyphone }}</td>
                    <td>{{ $person->phone }}</td>
                    <td>{{ $person->email }}</td>
                    <td>{{ $person->conname }}</td>
                    <td>{{ $person->conphone }}</td>
                    <td>{{ $person->conemail }}</td>
                  </tr>
                  @endforeach
                </table>
                </div><br>
                <button class="btn btn-lg btn-info" onclick="return onSubmit()">新增</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<script language="javascript">
window.onload = function()
{
    let q = document.getElementById('search').value;
    let ele = document.getElementById('mytable').getElementsByTagName('tr');
    for(let i=1; i<ele.length; i++){
        ele[i].style.display = 'none';
    }
};
function onSubmit() 
{ 
    var fields = $("input[name='member[]']").serializeArray(); 
    if (fields.length === 0) 
    { 
        alert('請至少勾選一位會員'); 
        // cancel submit
        return false;
    }
    return true;
}

function search(){
    show_all();
    let q = document.getElementById('search').value;
    let ele = document.getElementById('mytable').getElementsByTagName('tr');
    for(let i=1; i<ele.length; i++){
        let ind= ele[i].getAttribute("class");
        if(ind ==null){
            ind="-1";
            if( ele[i].getAttribute("name").search(q)==-1){
                ele[i].style.display = 'none';
            }
        }else{
            if( ele[i].getAttribute("name").search(q)==-1 && ind.search(q)==-1){
                ele[i].style.display = 'none';
            }
        }
        
    }
}

function show_all(){
    let ele = document.getElementById('mytable').getElementsByTagName('tr');
    console.log(ele);
    for(let i=1; i<ele.length; i++){
        ele[i].style.display = 'table-row';
    }
}

</script>

@endsection