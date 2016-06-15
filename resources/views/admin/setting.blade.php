@extends('layouts.admin')

@section('title')
    网站设置
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li class="active">网站设置</li>
        </ol>
        <form class="form-horizontal" action="#" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">网站标题</label>
                <div class="col-sm-4">
                    <input type="name" value="{{$site_name}}" class="form-control" name="site_name" placeholder="网站标题">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <hr>
                    <button type="submit" class="btn btn-primary">保存更改</button>
                </div>
            </div>
        </form>
    </div>
@endsection