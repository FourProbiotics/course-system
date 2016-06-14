@extends('layouts.app')

@section('title')
    我的课程
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">用户中心</a></li>
            <li class="active">我的课程</li>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th>课程名</th>
                <th>作业</th>
                <!- 已完成作业数/全部作业数量 -->
                <th>资源</th>
                <!- 资源数量 -->
                <th>人数</th>
                <th>教师</th>
                <th>学期</th>
                <th>开课学院</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{$course->course_id}}</th>
                <td><a href="{{ url('/') }}/course/{{$course->course_id}}">{{$course->course_name}}</a></td>
                <td>{{$course->answer_count}}/{{$course->homework_count}}</td>
                <td>{{$course->resource_count}}</td>
                <td>{{$course->member_count}}</td>
                <td>{{$course->teacher_name}}</td>
                <td>{{$course->course_term}}</td>
                <td>{{$course->course_college}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
