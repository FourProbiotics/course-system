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
                <th>截止时间</th>
                <th>已提交</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($homework_list as $key => $val)
            <tr>
                <th scope="row">{{$val->homework_id}}</th>
                <td><a href="#">{{$val->homework_title}}</a></td> <!-- 点击显筛选课程作业 -->
                <td>{{$val->homework_title}}</td>
                <td>{{$val->deadline}}</td>
                <td>{{$val->marking_status}}</td>
                <td>
                    <a href="{{ url('/admin/homework/'.$val->homework_id.'/answer/') }}" class="btn btn-default btn-xs">批阅</a>
                    <a href="{{ url('/admin/homework/'.$val->homework_id.'/edit/') }}" class="btn btn-default btn-xs">编辑</a>
                    <a href="{{ url('/admin/homework/'.$val->homework_id.'/delete/') }}" class="btn btn-default btn-xs">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection