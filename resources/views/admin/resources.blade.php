@extends('layouts.admin')

@section('title')
    资源管理
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li class="active">课程资源</li>
            <a href="{{ url('/admin/resource/new') }}" class="btn btn-primary btn-xs">新建资源</a>

        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th>课程</th>
                <th>资源名</th>
                <th>权限</th><!-- 公开/需登录 -->
                <th>时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Databases, JavaScript, Ajax 和 PHP 2016/2017(1)</td>
                <td>Chapter1. PHP is the best programing language</td>
                <td>公开</td>
                <td>2016-01-01 01:01:01</td>
                <td>
                    <a href="{{ url('/admin/resource/1/edit') }}" class="btn btn-default btn-xs">编辑</a>
                    <a href="{{ url('/admin/resource/1/delete') }}" class="btn btn-default btn-xs">删除</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>>
@endsection