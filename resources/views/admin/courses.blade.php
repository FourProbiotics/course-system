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
            @foreach($course_list as $key => $val)
            <tr>
                <th scope="row">{{$val->course_id}}</th>
                <td>{{$val->course_name}}</td>
                <td>{{$val->teacher_name}}</td>
                <td>{{$val->course_term}}</td>
                <td>{{$val->course_college}}</td>
                <td>
                    <a href="{{ url('/admin/course/'.$val->course_id.'/edit') }}" class="btn btn-default btn-xs">编辑</a>
                    <a href="{{ url('/admin/course/'.$val->course_id.'/groups/') }}" class="btn btn-default btn-xs">分组</a>
                    <a href="{{ url('/admin/course/'.$val->course_id.'/students/') }}" class="btn btn-default btn-xs">全部学生</a>
                    <a href="{{ url('/admin/course/'.$val->course_id.'/delete') }}" class="btn btn-default btn-xs">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection