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
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>201319630000</td>
                <td>小明</td>
                <td>实验二作业</td>
                <td><a href="#">xxx.zip</a></td>
                <td>80/100</td>
                <td>
                    <a href="{{ url('/admin/homework/1/marking') }}" class="btn btn-default btn-xs">详细&评分</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection