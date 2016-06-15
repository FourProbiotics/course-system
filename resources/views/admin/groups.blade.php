@extends('layouts.admin')

@section('title')
    分组
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li class="active">分组管理</li>
            <a href="{{ url('/admin/groups/new') }}" class="btn btn-primary btn-xs">新建分组</a>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>组号</th>
                <th>成员</th>
                <th>课程</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($group_list as $key => $val)
            <tr>
                <th scope="row">{{$val->group_id}}</th>
                <td>
                    @foreach($val->member as $k => $v)
                        {{$v->name}},
                    @endforeach
                </td>
                <td>{{$val->course_info->course_name}}</td>
                <td>
                    <a href="{{ url('/admin/groups/1/edit') }}" class="btn btn-default btn-xs">编辑</a>
                    <a href="{{ url('/admin/groups/1/marking/') }}" class="btn btn-default btn-xs">评分</a>
                    <a href="{{ url('/admin/groups/1/delete') }}" class="btn btn-default btn-xs">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection