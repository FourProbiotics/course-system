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
            <tr>
                <th scope="row">1</th>
                <td><a href="./course.php">Databases, JavaScript, Ajax 和 PHP</a></td>
                <td><a href="./usr_homework.php">t2.实现简单微博</a></td>
                <td>未提交</td>
                <td>未知</td>
                <td>2016-04-04 23:59</td>
                <td>
                    <a href="./usr_homework.php" class="btn btn-default btn-xs">查看详情</a>
                    <a href="./usr_submithw.php" class="btn btn-default btn-xs">提交作业</a>
                    <!-- 如果作业已经提交，此按钮变成编辑作业，若已过期，加上disabled类 -->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
