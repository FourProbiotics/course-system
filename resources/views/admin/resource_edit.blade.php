@extends('layouts.admin')

@section('title')
    编辑资源
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="{{ url('/admin/resources') }}">课程资源管理</a></li>
            <li class="active">编辑资源</li>
        </ol>
        <form class="form-horizontal" action="#" method="post">
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">资源名</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputName" placeholder="资源名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPermission" class="col-sm-2 control-label">权限</label>
                <div class="col-sm-4 radio">
                    <label><input type="radio" name="permission" id="inputPermission" checked>公开</label>
                    <label><input type="radio" name="permission" id="inputPermission">需登录</label>
                </div>
            </div>
            <div class="form-group">
                <label for="inputCourse" class="col-sm-2 control-label">课程</label>
                <div class="col-sm-4">
                    <select class="form-control" id="inputCourse">
                        <option>2817：课程1 2016/2017（1）</option>
                        <option selected>2817：课程1 2016/2017（1）</option>
                        <option>2817：课程1 2016/2017（1）</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">内容</label>
                <div class="col-sm-8">
                    <textarea rows="5" name="content" class="form-control" id="inputContent"
                              placeholder="资源描述/资源内容"></textarea>
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
                    <button type="submit" class="btn btn-primary">保存修改</button>
                </div>
            </div>
        </form>
    </div>
@endsection