@extends('layouts.admin')

@section('title')
    回复评论
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="{{ url('/admin/comments') }}">评论管理</a></li>
            <li class="active">回复</li>
        </ol>
        <form class="form-horizontal" action="#" method="post">
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">评论内容</label>
                <div class="col-sm-8">
                    <p class="form-control-static">这是评论内容</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">内容</label>
                <div class="col-sm-8">
                    <textarea rows="5" name="content" class="form-control" id="inputContent"
                              placeholder="回复内容"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <hr>
                    <button type="submit" class="btn btn-primary">回复</button>
                </div>
            </div>
        </form>
    </div>
@endsection