@extends('layouts.admin')

@section('title')
    作业管理
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li class="active">作业管理</li>
            <a href="{{ url('/admin/homework/new') }}" class="btn btn-primary btn-xs">新作业</a>

        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th>课程</th>
                <th>作业标题</th>
                <th>满分</th>
                <th>截止时间</th>
                <th>已提交</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td><a href="#">Databases, JavaScript, Ajax 和 PHP 2016/2017(1)</a></td> <!-- 点击显筛选课程作业 -->
                <td>t2.实现简单微博</td>
                <td>100</td>
                <td>2016-01-01 01:01:01</td>
                <td>30/80</td>
                <td>
                    <a href="{{ url('/admin/homework/1/detail/') }}" class="btn btn-default btn-xs">批阅</a>
                    <a href="{{ url('/admin/homework/1/edit/') }}" class="btn btn-default btn-xs">编辑</a>
                    <a href="{{ url('/admin/homework/1/delete/') }}" class="btn btn-default btn-xs">删除</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection