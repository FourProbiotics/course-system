@extends('layouts.app')

@section('title')
    课程列表
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li class="active">全部课程</li>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th>课程名</th>
                <th>教师</th>
                <th>学期</th>
                <th>开课学院</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($courses as $key => $val) {?>
            <tr>
                <th scope="row">{{$val->course_id}}</th>
                <td>
                    <a href="{{ url('/course/'.$val->course_id) }}">{{$val->course_name}}</a>
                </td>
                <td>{{$val->teacher_name}}</td>
                <td>{{$val->course_term}}</td>
                <td>{{$val->course_college}}</td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
@endsection
