@extends('layouts.app')

@section('title')
    消息详情
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">用户中心</a></li>
            <li><a href="#">消息信息</a></li>
            <li class="active">这是消息的标题</li>
        </ol>
        <div class="panel panel-default" style="width: 35em;margin: 3em auto;">
            <div class="panel-heading">
                <span>这是消息的标题</span>
            </div>
            <div class="panel-body" style="line-height: 1.8em;">
                <p>这是消息的内容。这是消息的内容。这是消息的内容。这是消息的内容。这是消息的内容。这是消息的内容。</p>
            </div>
            <div class="panel-footer" style="background: #FFF;">
                <a href="#" class="btn btn-default btn-sm" onclick="history.go(-1)">返回</a>
                <div style="float: right; font-size: 0.9em; color: #858585; text-align: right; line-height: 3em;">系统 |
                    To 用户名 | 2016-04-04 10:10:10
                </div>
            </div>
        </div>
    </div>
@endsection
