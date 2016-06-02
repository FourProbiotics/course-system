@extends('layouts.admin')

@section('title')
    课程管理
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li class="active">课程管理</li>
            <a href="{{ url('/admin/course/new') }}" class="btn btn-primary btn-xs">新建课程</a>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>编号</th>
                <th>课程名</th>
                <th>教师</th>
                <th>学期</th>
                <th>开课学院</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">22210</th>
                <td>Databases, JavaScript, Ajax 和 PHP</td>
                <td>徐利锋</td>
                <td>2016/2017(1)</td>
                <td>计算机学院</td>
                <td>
                    <a href="{{ url('/admin/course/1/edit') }}" class="btn btn-default btn-xs">编辑</a>
                    <a href="{{ url('/admin/course/1/students/') }}" class="btn btn-default btn-xs">学生</a>
                    <a href="{{ url('/admin/course/1/delete') }}" class="btn btn-default btn-xs">删除</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection