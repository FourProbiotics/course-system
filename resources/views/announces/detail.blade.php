@extends('layouts.app')

@section('title')
    公告详情 - {{$announce->title}}
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">公告</a></li>
            <li class="active">{{$announce->title}}</li>
        </ol>
        <h2 style="margin: 1.5em 0 0.5em 0;text-align: center;">{{$announce->title}}</h2><!-- 标题 -->
        <div style="text-align: center; font-size: 0.9em; color: #858585;">{{$announce->update_time}}</div><!-- 时间 -->
        <div style="border-top: 1px solid #DDD;margin-top: 1em;padding: 1em;"><!-- 内容部分，此处只有管理员可用，我认为不用防止XSS -->
            {{$announce->content}}
        </div>
    </div>
@endsection