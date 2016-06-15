@extends('layouts.admin')

@section('title')
    学生管理
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li class="active">学生管理</li>
            <a href="{{ url('/admin/student/new') }}" class="btn btn-primary btn-xs">增加学生</a>
            <a href="{{ url('/admin/student/import') }}" class="btn btn-primary btn-xs">导入学生</a>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th>学号</th>
                <th>姓名</th>
                <th>邮箱</th>
                <th>手机</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user_list as $key => $val)
            <tr>
                <th scope="row">{{$val->id}}</th>
                <td>{{$val->uno}}</td>
                <td>{{$val->name}}</td>
                <td>{{$val->email}}</td>
                <td>{{$val->mobile}}</td>
                <td>
                    <a href="{{ url('/admin/student/'.$val->id.'/edit') }}" class="btn btn-default btn-xs">编辑</a>
                    <a href="{{ url('/admin/student/'.$val->id.'/delete') }}" class="btn btn-default btn-xs">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection