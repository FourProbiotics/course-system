@extends('layouts.app')

@section('title')
    我的消息
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">用户中心</a></li>
            <li class="active">消息信息</li>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th style="min-width: 20em;">标题</th>
                <th>状态</th>
                <th>类型</th>
                <!- 系统消息，管理员自定义消息 -->
                <th>时间</th>
            </tr>
            </thead>
            <tbody>
            <tr> <!-- 这是未读的消息 -->
                <th scope="row">1</th>
                <td><a href="{{ url('home/message/1') }}">这是消息的标题</a></td>
                <td>未读</td>
                <td>系统</td>
                <td>2016-04-04 10:20:30</td>
            </tr>
            <tr> <!-- 这是已读的消息 -->
                <th scope="row">2</th>
                <td><a class="msg_hadread" href="{{ url('home/message/1') }}">这是消息的标题</a></td>
                <td>已读</td>
                <td>管理员</td>
                <td>2016-04-04 10:20:30</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
