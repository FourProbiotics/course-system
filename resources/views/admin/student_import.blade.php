@extends('layouts.admin')

@section('title')
    新增学生
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="{{ url('/admin/students') }}">学生管理</a></li>
            <li class="active">导入</li>
        </ol>
        <p class="bg-warning" style="padding: 1em;">注：系统会自动去除重复学生。</p>
        <form class="form-horizontal" action="#" method="post">
            <div class="form-group">
                <label for="inputFile" class="col-sm-2 control-label">CSV</label>
                <div class="col-sm-8">
                    <input type="file" name="file" id="inputFile">
                    <p class="help-block">格式： 学号 姓名 学院 专业 邮箱 手机</p>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="inputIns" class="col-sm-2 control-label">初始密码</label>
                <div class="col-sm-4">
                    <input type="text" name="passwrod" class="form-control" id="inputIns" placeholder="选填">
                    <p class="help-block">默认为学号后6位</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputCourse" class="col-sm-2 control-label">分组</label>
                <div class="col-sm-4">
                    <div style="width: 200%;max-height: 8em;overflow: auto;font-size: 0.9em;">
                        <select name="group_id" class="form-control">
                            <option value="0">无</option>
                            @foreach($group_list as $key => $val)
                                <option value="{{$val->group_id}}">{{$val->group_id}}
                                    组:{{$val->course_info->course_name}}|{{$val->course_info->course_term}} :
                                    @foreach($val->member as $k => $v)
                                        {{$v->name.' '}}
                                    @endforeach
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <p class="help-block">选填，自动将学生加入课程名单，自动去重</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <hr>
                    <button type="submit" class="btn btn-primary">导入学生</button>
                </div>
            </div>
        </form>
    </div>
@endsection