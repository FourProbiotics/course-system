@extends('layouts.admin')

@section('title')
    新建短消息
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li class="active">已发消息</li>
            <a href="{{ url('/admin/message/new') }}" class="btn btn-primary btn-xs">新建短消息</a>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th>to</th>
                <th style="min-width: 20em;">内容</th>
                <th>时间</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>201319630000</td>
                <td>你好啊</td>
                <td>2016-01-01 11:11:11</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection