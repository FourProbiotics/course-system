@extends('layouts.admin')

@section('title')
    编辑学生
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="{{ url('/admin/students') }}">学生管理</a></li>
            <li class="active">编辑</li>
        </ol>
        <form class="form-horizontal" action="#" method="post">
            @if ($errors->hasBag('default'))
                <span class="help-block">
                            <strong>{{ $errors->first() }}</strong>
                        </span>
            @endif
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-4">
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="学生姓名"
                           value="{{$user_info->name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">学号</label>
                <div class="col-sm-4">
                    <input type="number" name="uno" class="form-control" id="inputName" placeholder="学生学号"
                           value="{{$user_info->uno}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputIns" class="col-sm-2 control-label">重置密码</label>
                <div class="col-sm-4">
                    <input type="password" name="new_password" class="form-control" id="inputIns" placeholder="重置密码">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="inputIns" class="col-sm-2 control-label">学院</label>
                <div class="col-sm-4">
                    <input type="text" name="college" class="form-control" id="inputIns" placeholder="学院"
                           value="{{$user_info->college}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputMajor" class="col-sm-2 control-label">班级</label>
                <div class="col-sm-4">
                    <input type="text" name="class" class="form-control" id="inputMajor" placeholder="选填"
                           value="{{$user_info->class}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputMail" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-4">
                    <input type="email" name="email" class="form-control" id="inputName" placeholder="选填"
                           value="{{$user_info->email}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPhone" class="col-sm-2 control-label">手机</label>
                <div class="col-sm-4">
                    <input type="number" name="mobile" class="form-control" id="inputPhone" placeholder="选填"
                           value="{{$user_info->mobile}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputCourse" class="col-sm-2 control-label">分组</label>
                <div class="col-sm-4">
                    <div style="width: 200%;max-height: 8em;overflow: auto;font-size: 0.9em;">
                        <select name="group_id" class="form-control">
                            <option value="0">无</option>
                            @foreach($group_list as $key => $val)
                                <option {{$user_info->group_id==$val->group_id?'selected':''}} value="{{$val->group_id}}">{{$val->group_id}}
                                    组:{{$val->course_info->course_name}}|{{$val->course_info->course_term}} :
                                    @foreach($val->member as $k => $v)
                                        {{$v->name.' '}}
                                    @endforeach
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <hr>
                    <button type="submit" class="btn btn-primary">保存更改</button>
                </div>
            </div>
        </form>
    </div>
@endsection