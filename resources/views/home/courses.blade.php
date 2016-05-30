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
                <th scope="row">22210</th>
                <td><a href="{{ url('/') }}/course/22210">Databases, JavaScript, Ajax 和 PHP</a></td>
                <td>3/4</td>
                <td>5</td>
                <td>9</td>
                <td>徐利锋</td>
                <td>2016/2017(1)</td>
                <td>计算机学院</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
