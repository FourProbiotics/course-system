@extends('layouts.admin')

@section('title')
    作业管理
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="#">作业管理</a></li>
            <li class="active">t2.实现简单微博</li>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th>学号</th>
                <th>姓名</th>
                <th>标题</th>
                <th>附件</th>
                <th>分数</th>
                <th>审阅</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($answer_list as $key => $val)
            <tr>
                <th scope="row">{{$val->answer_id}}</th>
                <td>{{$val->user_info->uno}}</td>
                <td>{{$val->user_info->name}}</td>
                <td>{{$val->homework_info->homework_title}}</td>
                <td>
                    @foreach($val->resource as $k => $v)
                        <a href="{{ url('/download/'.$v->id) }}">{{$v->file_name}}</a>
                    @endforeach
                </td>
                <td>{{$val->score}}</td>
                <td>{{$val->read_flag?'已批改':'未批改'}}</td>
                <td>
                    <a href="{{ url('/admin/homework/'.$val->homework_info->homework_id.'/answer/'.$val->answer_id.'/marking') }}" class="btn btn-default btn-xs">详细&评分</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection