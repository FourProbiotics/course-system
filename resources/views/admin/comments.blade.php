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
            @foreach($comments as $key => $val)
                <tr>
                    <th scope="row">{{$val->id}}</th>
                    <td><a href="{{ url('/admin/student/'.$val->id.'/edit') }}">{{$val->user_info->name}}</a></td>
                    <td>{{$val->content}}</td>
                    <td><a href="{{ url('/course/'.$val->id) }}">Course {{$val->course_id}}</a></td>
                    <td>{{$val->update_time}}</td>
                    <td>
                        <a href="{{ url('/admin/comment/'.$val->id.'/reply') }}" class="btn btn-default btn-xs">回复</a>
                        <a href="{{ url('/admin/comment/'.$val->id.'/delete') }}" class="btn btn-default btn-xs">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection