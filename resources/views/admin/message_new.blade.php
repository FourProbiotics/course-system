@extends('layouts.admin')

@section('title')
    新建短消息
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="#">短消息</a></li>
            <li class="active">发送</li>
        </ol>
        <form class="form-horizontal" action="#" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="inputTo" class="col-sm-2 control-label">用户</label>
                <div class="col-sm-4">
                    <input type="text" name="user" class="form-control" id="inputTo" placeholder="接收消息的用户（学号）">
                    <p class="help-block">多个用户用英文逗号(,)隔开，无指定用户留空</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputGroup" class="col-sm-2 control-label">群组</label>
                <div class="col-sm-4">
                    <div style="width: 200%;max-height: 8em;overflow: auto;font-size: 0.9em;">
                        <label><input type="checkbox" name="group[]" value="all">全部学生</label><br>
                        @foreach($group_list as $key => $val)
                        <label><input type="checkbox" name="group[]" value="{{$val->group_id}}">
                            {{$val->group_id}}组:{{$val->course_info->course_name}}|{{$val->course_info->course_term}} :
                            @foreach($val->member as $k => $v)
                                {{$v->name.' '}}
                            @endforeach
                        </label><br>
                        @endforeach
                    </div>
                    <p class="help-block">无指定群组留空</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">标题</label>
                <div class="col-sm-4">
                    <input type="text" name="title" class="form-control" id="inputTitle" placeholder="消息标题">
                </div>
            </div>
            {{--<div class="form-group">
                <label for="inputClass" class="col-sm-2 control-label">类型</label>
                <div class="col-sm-2">
                    <input type="text" name="type" class="form-control" id="inputClass" placeholder="消息类型">
                    <p class="help-block">如：系统，管理员.</p>
                </div>
            </div>--}}
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">内容</label>
                <div class="col-sm-8">
                    <textarea rows="5" name="content" class="form-control" id="inputContent"
                              placeholder="消息内容"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <hr>
                    <button type="submit" class="btn btn-primary">发送</button>
                </div>
            </div>
        </form>
    </div>
@endsection