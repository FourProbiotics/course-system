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
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-4">
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="学生姓名">
                </div>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">学号</label>
                <div class="col-sm-4">
                    <input type="text" name="id" class="form-control" id="inputName" placeholder="学生学号">
                </div>
            </div>
            <div class="form-group">
                <label for="inputIns" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-4">
                    <input type="text" name="passwrod" class="form-control" id="inputIns" placeholder="留空不修改">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="inputIns" class="col-sm-2 control-label">学院</label>
                <div class="col-sm-4">
                    <input type="text" name="ins" class="form-control" id="inputIns" placeholder="学院">
                </div>
            </div>
            <div class="form-group">
                <label for="inputMajor" class="col-sm-2 control-label">专业</label>
                <div class="col-sm-4">
                    <input type="text" name="major" class="form-control" id="inputMajor" placeholder="选填">
                </div>
            </div>
            <div class="form-group">
                <label for="inputMail" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-4">
                    <input type="email" name="email" class="form-control" id="inputName" placeholder="选填">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPhone" class="col-sm-2 control-label">手机</label>
                <div class="col-sm-4">
                    <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="选填">
                </div>
            </div>
            <div class="form-group">
                <label for="inputCourse" class="col-sm-2 control-label">课程</label>
                <div class="col-sm-4">
                    <div style="width: 200%;max-height: 8em;overflow: auto;font-size: 0.9em;">
                        <label><input type="checkbox" name="inputCourses[]">Databases, JavaScript, Ajax 和 PHP
                            2016/2017（1）</label><br>
                        <label><input type="checkbox" name="inputCourses[]">Databases, JavaScript, Ajax 和 PHP
                            2015/2016（1）</label><br>
                    </div>
                    <p class="help-block">选填</p>
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