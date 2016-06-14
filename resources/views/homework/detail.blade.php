@extends('layouts.app')

@section('title')
    作业详情
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">用户中心</a></li>
            <li><a href="#">作业管理</a></li>
            <li><a href="#">{{$homework->homework_title}}</a></li>
            <li class="active">详情</li>
        </ol>
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
                    <label class="col-sm-2 control-label">老师</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{$homework->course_info->teacher_name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">截止时间</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">{{$homework->deadline}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">作业内容</label>
                    <div class="col-sm-10">
                        <div class="form-control-static">
                            {{$homework->homework_content}}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">附件</label>
                    <div class="col-sm-10">
                        @foreach($homework->resource as $key => $val)
                            <p class="form-control-static"><a
                                        href="{{ url('/resource/'.$val->id) }}">{{$val->file_name}}</a></p>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <hr>
                        <a href="{{ url('/homework/'.$homework->homework_id.'/submit/') }}"
                           class="btn btn-primary">提交作业</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
