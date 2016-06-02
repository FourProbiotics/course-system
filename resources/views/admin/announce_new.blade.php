@extends('layouts.admin')

@section('title')
    新建公告
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li class="active">新建公告</li>
        </ol>
        <form class="form-horizontal" action="#" method="post">
            <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">标题</label>
                <div class="col-sm-4">
                    <input type="text" name="title" class="form-control" id="inputTitle" placeholder="公告标题">
                </div>
            </div>
            <div class="form-group">
                <label for="inputClass" class="col-sm-2 control-label">类型</label>
                <div class="col-sm-2">
                    <input type="text" name="class" class="form-control" id="inputClass" placeholder="公告类型">
                    <p class="help-block">如：系统，规则.</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">内容</label>
                <div class="col-sm-8">
                    <textarea rows="5" name="content" class="form-control" id="inputContent"
                              placeholder="公告内容"></textarea>
                    <script>CKEDITOR.replace('inputContent');</script>
                </div>
            </div>
            <div class="form-group">
                <label for="inputFile" class="col-sm-2 control-label">附件</label>
                <div class="col-sm-8">
                    <input type="file" name="file" id="inputFile">
                    <p class="help-block">支持格式： .zip, .rar, .doc, .docx, .pdf.</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <hr>
                    <button type="submit" class="btn btn-primary">发表公告</button>
                </div>
            </div>
        </form>
    </div>
@endsection