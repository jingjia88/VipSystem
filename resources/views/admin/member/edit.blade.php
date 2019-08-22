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
    
    <h2> 編輯會員 </h2> 
    
    <div class="panel panel-default"  >
        <div class="panel-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>失败</strong> 输入不符合要求<br><br>
                    {!! implode('<br>', $errors->all()) !!}
                </div>
            @endif

            <form action="{{ url('admin/'.$member->id) }}" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <h4>姓名：</h4>
                <input type="text" name="name" class="form-control" required="required" value="{{ $member->name }}">
                
                <h4>email：</h4>
                <input type="text" name="email" class="form-control" value="{{ $member->email }}">
            
                <h4>電話號碼：</h4>
                <input type="text" name="phone" class="form-control" value="{{ $member->phone }}">
                
                <h4>職位：</h4>
                <input type="text" name="identity" class="form-control" value="{{ $member->identity }}">
                
                <h4>公司：</h4>
                <input type="text" name="company" class="form-control" value="{{ $member->company }}">
                <br>
                <button class="btn btn-lg btn-info">確定</button>
            </form>
        </div>
    </div>
    </div>
</div>



@endsection