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
                <th style="min-width: 20em;">标题</th>
                <th style="min-width: 20em;">内容</th>
                <th>时间</th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $key => $val)
            <tr>
                <th scope="row">{{$val->id}}</th>
                <td>
                    @foreach($val->recipient_user as $k => $v)
                        {{$v->name}}
                    @endforeach
                </td>
                <td>{{$val->title}}</td>
                <td>{{$val->content}}</td>
                <td>{{$val->add_time}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection