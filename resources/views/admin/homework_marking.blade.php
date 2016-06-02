@extends('layouts.admin')

@section('title')
    作业评分
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="{{ url('/admin/homework') }}">作业管理</a></li>
            <li><a href="#">t2.实现简单微博</a></li>
            <li class="active">详细&评分</li>
        </ol>
        <form class="form-horizontal" action="#" method="post">
            <div class="form-group">
                <label for="inputStu" class="col-sm-2 control-label">学生</label>
                <div class="col-sm-4">
                    <p class="form-control-static">小明（201319630000）</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">标题</label>
                <div class="col-sm-4">
                    <p class="form-control-static">这是学生的作业标题</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputHW" class="col-sm-2 control-label">内容</label>
                <div class="col-sm-4">
                    <p class="form-control-static">这是学生的作业内容</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputFile" class="col-sm-2 control-label">附件</label>
                <div class="col-sm-8">
                    <p class="form-control-static"><a href="#">xxxx.zip</a></p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputScore" class="col-sm-2 control-label">分数</label>
                <div class="col-sm-2">
                    <input type="number" name="class" class="form-control" id="inputScore" placeholder="满分100">
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">评价</label>
                <div class="col-sm-8">
                    <textarea rows="3" name="content" class="form-control" id="inputContent"
                              placeholder="作业评价"></textarea>
                    <script>CKEDITOR.replace('inputContent');</script>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <hr>
                    <button type="submit" class="btn btn-primary">提交评分</button>
                </div>
            </div>
        </form>
    </div>
@endsection