@extends('layouts.app')

@section('title')
    我的作业
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">用户中心</a></li>
            <li class="active">作业管理</li>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th>课程名</th>
                <th>作业标题</th>
                <th>状态</th><!-- 未提交/未批改/已批改 -->
                <th>评分</th>
                <th>截至日期</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($homework_list as $key => $val)
            <tr>
                <th scope="row">1</th>
                <td><a href="{{ url('/course/'.$val->course_info->course_id) }}">{{$val->course_info->course_name}}</a>
                </td>
                <td><a href="{{ url('/homework/'.$val->homework_id) }}">{{$val->homework_title}}</a></td>
                @if($val->answer)
                    <td>未提交</td>
                @else
                    <td>已提交</td>
                @endif
                @if($val->answer && $val->answer->read_flag)
                    <td>{{$val->answer->score}}</td>
                @else
                    <td>未知</td>
                @endif
                <td>{{$val->deadline}}</td>
                <td>
                    <a href="{{ url('/homework/'.$val->homework_id) }}" class="btn btn-default btn-xs">查看详情</a>
                    <a href="{{ url('/homework/'.$val->homework_id.'submit/') }}"
                       class="btn btn-default btn-xs">提交作业</a>
                    <!-- 如果作业已经提交，此按钮变成编辑作业，若已过期，加上disabled类 -->
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
