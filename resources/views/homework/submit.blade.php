@extends('layouts.app')

@section('title')
    作业提交
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">用户中心</a></li>
            <li><a href="#">作业管理</a></li>
            <li><a href="#">{{$homework->homework_title}}</a></li>
            <li class="active">提交</li>
        </ol>
        <p class="bg-warning" style="padding: 1em;">注意：请按老师要求的格式提交作业。</p>
        <div style="margin-top: 1em; border-top: 1px solid #DDD; padding: 1em;">
            <form class="form-horizontal" action="#" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">课程名</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{$homework->course_info->course_name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">作业</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{$homework->homework_title}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTitle" class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputTitle" placeholder="您提交的作业标题">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputContent" class="col-sm-2 control-label">内容</label>
                    <div class="col-sm-8">
                        <textarea rows="5" class="form-control" id="inputPhone"
                                  placeholder="作业内容. 不支持HTML标签"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFile" class="col-sm-2 control-label">附件</label>
                    <div class="col-sm-8">
                        <input type="file" id="inputFile">
                        <p class="help-block">支持格式： .zip, .rar, .doc, .docx, .pdf.</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <hr>
                        <button type="submit" class="btn btn-primary">确认提交</button>
                        <button type="reset" class="btn btn-default">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
