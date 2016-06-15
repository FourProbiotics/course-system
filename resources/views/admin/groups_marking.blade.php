@extends('layouts.admin')

@section('title')
    评分
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="{{ url('/admin/groups') }}">分组管理</a></li>
            <li class="active">评分</li>
        </ol>
        <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
            @if ($errors->hasBag('default'))
                <span class="help-block">
                    <strong>{{ $errors->first() }}</strong>
                </span>
            @endif
            {!! csrf_field() !!}

            <div class="form-group">
                <label class="col-sm-2 control-label">课程</label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{$group->course_info->course_name}}</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">成员</label>
                <div class="col-sm-10">
                    <p class="form-control-static">@foreach($group->member as $key => $val){{$val->name}}
                        ,@endforeach</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">评分</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control " value="{{$group->score}}" name="marking"
                           placeholder="评分">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <hr>
                    <button type="submit" class="btn btn-primary">评分</button>
                </div>
            </div>
        </form>
    </div>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('teach_plan');
        UE.getEditor('teach_outline');
    </script>
@endsection


