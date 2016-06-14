@extends('layouts.app')

@section('title')
    我的消息
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">用户中心</a></li>
            <li class="active">消息信息</li>
        </ol>
        <table class="table">
            <thead style="border-top: 1px solid #DDD;background-color: #f9f9f9;">
            <tr>
                <th>#</th>
                <th style="min-width: 20em;">标题</th>
                <th>状态</th>
                <th>类型</th>
                <!- 系统消息，管理员自定义消息 -->
                <th>时间</th>
            </tr>
            </thead>
            <tbody>
            <?php $count = count($messages); ?>
            @foreach($messages as $key => $val)
            <tr> <!-- 这是未读的消息 -->
                <th scope="row">{{$count--}}</th>
                <td><a <?php if($val->read_flag == 1) {?>class="msg_hadread"
                       <?php } ?>href="{{ url('home/message/'.$val->id) }}">{{$val->title}}</a></td>
                @if($val->read_flag == 0)
                    <td>未读</td>
                @else
                    <td>已读</td>
                @endif
                @if($val->sender_uid == 1)
                    <td>管理员</td>
                @else
                    <td>系统</td>
                @endif
                <td>{{$val->add_time}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
