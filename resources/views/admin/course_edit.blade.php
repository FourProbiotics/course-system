@extends('layouts.admin')

@section('title')
    编辑课程
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="{{ url('/admin/courses') }}">课程管理</a></li>
            <li class="active">编辑课程</li>
        </ol>
        <form class="form-horizontal" action="#" method="post">
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">编号</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="inputID" placeholder="课程编号">
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">课程名</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputName" placeholder="课程名">
                </div>
            </div>
            <div class="form-group">
                <label for="inputTeacher" class="col-sm-2 control-label">教师</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputTeacher" placeholder="授课教师">
                </div>
            </div>
            <div class="form-group">
                <label for="inputIns" class="col-sm-2 control-label">学院</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputIns" placeholder="开课学院">
                </div>
            </div>
            <div class="form-group">
                <label for="inputDesc" class="col-sm-2 control-label">描述</label>
                <div class="col-sm-8">
                    <textarea rows="5" name="content" class="form-control" id="inputDesc" placeholder="课程描述"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">教学日历</label>
                <div class="col-sm-8">
                    <textarea rows="5" name="content" class="form-control" id="inputContent"
                              placeholder="公告内容"></textarea>
                    <script>CKEDITOR.replace('inputContent');</script>
                </div>
            </div>
            <div class="form-group">
                <label for="inputFile" class="col-sm-2 control-label">附件</label>
                <div class="col-sm-8">
                    <p class="form-control-static"><a href="#">xxxx.zip</a></p>
                    <input type="file" name="file" id="inputFile">
                    <p class="help-block">支持格式： .zip, .rar, .doc, .docx, .pdf.</p>
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