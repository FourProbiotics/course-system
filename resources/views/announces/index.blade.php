@extends('layouts.app')

@section('title')
    公告列表
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li class="active">公告</li>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th style="min-width: 20em;">标题</th>
                <th>类型</th>
                <th>时间</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td><a href="{{ url('/announce/1') }}">这是公告的标题</a></td>
                <td>公告</td>
                <td>2016-04-04 10:20:30</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td><a href="{{ url('/announce/2') }}">这是公告的标题</a></td>
                <td>公告</td>
                <td>2016-04-04 10:20:30</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
