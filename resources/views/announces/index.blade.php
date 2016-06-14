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
            @foreach($announces as $key => $val)
            <tr>
                <th scope="row">1</th>
                <td><a href="{{ url('/announce/'.$val->id) }}">{{$val->title}}</a></td>
                <td>{{$val->type}}</td>
                <td>{{$val->update_time}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
