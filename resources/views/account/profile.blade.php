@extends('layouts.app')

@section('title')
    个人信息
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">用户中心</a></li>
            <li class="active">个人资料</li>
        </ol>
        <p class="bg-warning" style="padding: 1em;">注意：如果不可修改信息存在错误，请联系授课老师修改。</p>
        <div style="margin-top: 1em; border-top: 1px solid #DDD; padding: 1em;">
            <form class="form-horizontal" action="#" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">学号</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{$user_info->uno}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{$user_info->name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">学院</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{$user_info->college}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">班级</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{$user_info->class}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMail" class="col-sm-2 control-label">邮箱</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="inputMail" value="{{$user_info->email}}"
                               placeholder="常用邮箱">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">手机号码</label>
                    <div class="col-sm-4">
                        <input type="tel" class="form-control" id="inputPhone" value="{{$user_info->mobile}}"
                               placeholder="常用手机号码">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-4">
                        <hr>
                        <button type="submit" class="btn btn-primary">确认更改</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
