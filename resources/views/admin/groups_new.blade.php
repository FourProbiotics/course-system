@extends('layouts.admin')

@section('title')
    新建分组
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="{{ url('/admin/groups') }}">分组管理</a></li>
            <li class="active">新建分组</li>
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
                <div class="col-sm-4">
                    <div style="width: 200%;max-height: 8em;overflow: auto;font-size: 0.9em;">
                        <select name="course_id" class="form-control">
                            @foreach($course_list as $key => $val)
                                <option value="{{$val->course_id}}">{{$val->course_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">成员</label>
                <div class="col-sm-3">
                    <input type="text" length="100" style="width:200%" class="form-control " name="member"
                           placeholder="成员学号，以英文逗号(,)分割">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <hr>
                    <button type="submit" class="btn btn-primary">新建分组</button>
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


