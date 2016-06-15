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
            <li class="active">详细&评分</li>
        </ol>
        <form class="form-horizontal" action="#" method="post">
            @if ($errors->hasBag('default'))
                <span class="help-block">
                    <strong>{{ $errors->first() }}</strong>
                </span>
            @endif
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="inputStu" class="col-sm-2 control-label">学生</label>
                <div class="col-sm-4">
                    <p class="form-control-static">{{$answer->user_info->name}}（{{$answer->user_info->uno}}）</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputHW" class="col-sm-2 control-label">内容</label>
                <div class="col-sm-4">
                    <p class="form-control-static">{{$answer->answer_content}}</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputFile" class="col-sm-2 control-label">附件</label>
                <div class="col-sm-8">
                    @if(isset($answer->resource))
                        @foreach($answer->resource as $key => $val)
                            <p class="form-control-static"><a
                                        href="{{ url('/download/'.$val->id) }}">{{$val->file_name}}</a></p>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="inputScore" class="col-sm-2 control-label">分数</label>
                <div class="col-sm-2">
                    <input type="number" name="marking" class="form-control" id="inputScore" value="{{$answer->score}}"
                           placeholder="分数">
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