@extends('layouts.admin')

@section('title')
    评论管理
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li class="active">评论管理</li>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th>姓名</th>
                <th style="min-width: 20em;">内容</th>
                <th>来源</th>
                <th>时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td><a href="{{ url('/admin/student/1/edit') }}">小明</a></td>
                <td>你好啊</td>
                <td><a href="{{ url('/course/1') }}">Databases, JavaScript, Ajax 和 PHP</a></td>
                <td>2016-01-01 11:11:11</td>
                <td>
                    <a href="{{ url('/admin/comment/1/reply') }}" class="btn btn-default btn-xs">回复</a>
                    <a href="{{ url('/admin/comment/1/delete') }}" class="btn btn-default btn-xs">删除</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection