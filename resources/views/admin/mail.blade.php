@extends('layouts.app')

@section('content')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

<div class="container" style="margin-left: 100px; ">
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
        <h2> send message </h2>
            <div class="panel panel-default"  >
                <div class="panel-body">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                @endif

                <span style="font-size: 16px; ">選擇收件人: </span><br>
                <input type="search" id="search" style="width:400px; margin-left:20px;" name="q" required="required" placeholder="Search..." />
                <button id="query" onclick="search();" class="btn btn-lg btn-info">搜索</button>
                <button onclick="show_all();" class="btn btn-lg btn-info">all</button>
                    

                <form action="{{ url('admin/mail/send') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="panel-body" style="height:300px;  overflow-y:scroll; overflow-x:auto; ">
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
                        @foreach ($members as $member)
                        <tr name="{{ $member->name }}" class="{{ $member->industry }}">
                            <td><input type="checkbox" style="zoom: 2" value="{{$member->id}}"  name="member[]"> 
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
                    <span style="font-size: 16px; ">主旨: </span>
                    <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题">
                    <br>
                    <textarea id="content"name="body" rows="10" class="form-control" required="required" placeholder="请输入内容"></textarea>
                    <br>
                    <span style="font-size: 16px; ">寄件人gmail帳號: </span>
                    <input type="email" name="username" class="form-control" placeholder="gmail帳號">
                    <span style="font-size: 16px; ">寄件人gmail密碼: </span>
                    <input type="password" name="pwd" class="form-control" placeholder="gmail密碼">
                    <br>
                    <button class="btn btn-lg btn-info" onclick="return onSubmit()">發送</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
window.onload = function()
{
    CKEDITOR.replace( 'content');
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

// register event on form, not submit button
$('#member_form').submit(onSubmit)

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