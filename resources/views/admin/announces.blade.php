@extends('layouts.admin')

@section('title')
    公告管理
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li class="active">公告管理</li>
            <a href="{{ url('/admin/announce/new') }}" class="btn btn-primary btn-xs">新建公告</a>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th style="min-width: 20em;">标题</th>
                <th>类型</th>
                <th>最后修改时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td><a href="{{ url('/announce/1') }}">这是公告的标题</a></td>
                <td>公告</td>
                <td>2016-04-04 10:20:30</td>
                <td>
                    <a href="{{ url('/admin/announce/1/edit') }}" class="btn btn-default btn-xs">编辑</a>
                    <a href="{{ url('/admin/announce/1/delete') }}" class="btn btn-default btn-xs">删除</a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td><a href="{{ url('/announce/2') }}">这是公告的标题</a></td>
                <td>公告</td>
                <td>2016-04-04 10:20:30</td>
                <td>
                    <a href="{{ url('/admin/announce/2/edit') }}" class="btn btn-default btn-xs">编辑</a>
                    <a href="{{ url('/admin/announce/2/delete') }}" class="btn btn-default btn-xs">删除</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection