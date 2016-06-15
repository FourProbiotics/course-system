@extends('layouts.admin')

@section('title')
    资源管理
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li class="active">资源</li>
            {{-- <a href="{{ url('/admin/resource/new') }}" class="btn btn-primary btn-xs">新建资源</a>--}}

        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th>关联项目</th>
                <th>资源内容</th>
                <th>下载</th>
                <th>时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($resources as $key => $val)
            <tr>
                <th scope="row">{{$val->id}}</th>
                <td><a href="{{ url('/'.$val->item_type.'/'.$val->item_id.'') }}">关联项目</a></td>
                <td>{{$val->resource_content}}</td>
                <td><a href="{{ url('/download/'.$val->id) }}">{{$val->file_name}}</a></td>
                <td>{{$val->add_time}}</td>
                <td>
                    {{--<a href="{{ url('/admin/resource/'.$val->id.'/edit') }}" class="btn btn-default btn-xs">编辑</a>--}}
                    <a href="{{ url('/admin/resource/'.$val->id.'/delete') }}" class="btn btn-default btn-xs">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>>
@endsection