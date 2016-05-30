@extends('layouts.app')

@section('title')
    资源详情
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">全部课程</a></li>
            <li><a href="#">Databases, JavaScript, Ajax 和 PHP</a></li>
            <li class="active">Chapter1. PHP is the best programing language</li>
        </ol>
        <h2 style="margin: 1.5em 0 0.5em 0;text-align: center;">Chapter1. PHP is the best programing language</h2>
        <div style="text-align: center; font-size: 0.9em; color: #858585;">2016-05-01 10:10:10</div>
        <div style="border-top: 1px solid #DDD;margin-top: 1em;padding: 1em;"><!-- 内容部分，此处只有管理员可用，我认为不用防止XSS -->
            <p style="line-height: 2em;">课程资源描述</p>
            <p><a href="#">xxxxxx.zip</a></p>
        </div>
    </div>
@endsection
