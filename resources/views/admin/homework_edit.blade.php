@extends('layouts.admin')

@section('title')
    编辑作业
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="{{ url('/admin/homework') }}">作业管理</a></li>
            <li class="active">新建</li>
        </ol>
        <form class="form-horizontal" action="#" method="post">
            <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">标题</label>
                <div class="col-sm-4">
                    <input type="text" name="to" class="form-control" id="inputTitle" placeholder="作业标题">
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
                </div>
            </div>
            <div class="form-group">
                <label for="inputTime" class="col-sm-2 control-label">截止日期</label>
                <div class="col-sm-4">
                    <input type="date" name="time" class="form-control" id="inputTime" placeholder="截止日期">
                </div>
            </div>
            <div class="form-group">
                <label for="inputScore" class="col-sm-2 control-label">满分</label>
                <div class="col-sm-2">
                    <input type="number" name="class" class="form-control" id="inputScore" placeholder="满分">
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">作业内容</label>
                <div class="col-sm-8">
                    <textarea rows="5" name="content" class="form-control" id="inputContent"
                              placeholder="作业内容"></textarea>
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