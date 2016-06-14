@extends('layouts.app')

@section('title')
    修改密码
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">用户中心</a></li>
            <li class="active">修改密码</li>
        </ol>
        <div style="margin: 4em auto;width: 30em;">
            <form action="#" class="form-horizontal" method="post">
                {!! csrf_field() !!}
                @if ($errors->hasBag('default'))
                    <span class="help-block">
                        <strong>{{ $errors->first() }}</strong>
                    </span>
                @endif
                <div class="form-group">
                    <label for="inputOld" class="col-sm-2 control-label">旧密码</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="old_password" placeholder="输入您的旧密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNew" class="col-sm-2 control-label">新密码</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="new_password" placeholder="输入您的新密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNewRep" class="col-sm-2 control-label">重复新密码</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="confirm_password" placeholder="重新输入您的新密码">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">修改密码</button>
                        <button type="reset" class="btn btn-default">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
