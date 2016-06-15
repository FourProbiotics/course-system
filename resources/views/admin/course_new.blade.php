@extends('layouts.admin')

@section('title')
    新建课程
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="{{ url('/admin/courses') }}">课程管理</a></li>
            <li class="active">新建课程</li>
        </ol>
        <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
            @if ($errors->hasBag('default'))
                <span class="help-block">
                            <strong>{{ $errors->first() }}</strong>
                        </span>
            @endif
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">课程名</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="name" placeholder="课程名">
                </div>
            </div>
            <div class="form-group">
                <label for="inputTerm" class="col-sm-2 control-label">学期</label>
                <div class="col-sm-4">
                    <select name="term" class="form-control">
                        @for($i = date('Y') - 1; $i < date('Y') + 4; $i++)
                            <option value ="{{$i}}/{{$i+1}}(1)">{{$i}}/{{$i+1}}(1)</option>
                            <option value ="{{$i}}/{{$i+1}}(2)">{{$i}}/{{$i+1}}(1)</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputTeacher" class="col-sm-2 control-label">教师</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="teacher" placeholder="授课教师">
                </div>
            </div>
            <div class="form-group">
                <label for="inputIns" class="col-sm-2 control-label">学院</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="college" placeholder="开课学院">
                </div>
            </div>
            <div class="form-group">
                <label for="inputDesc" class="col-sm-2 control-label">课程简介</label>
                <div class="col-sm-8">
                    <textarea rows="5" name="content" class="form-control" name="content" placeholder="课程简介"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputDesc" class="col-sm-2 control-label">教学大纲</label>
                <div class="col-sm-8">
                    <script id="teach_outline" name="teach_outline" type="text/plain"></script>
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">教学计划</label>
                <div class="col-sm-8">
                    <script id="teach_plan" name="teach_plan" type="text/plain"></script>
                </div>
            </div>
            <div class="form-group">
                <label for="inputFile" class="col-sm-2 control-label">附件</label>
                <div class="col-sm-8">
                    <input type="file" name="file" id="inputFile">
                    <p class="help-block">支持格式： {{get_config('allowed_upload_types')}}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <hr>
                    <button type="submit" class="btn btn-primary">新建课程</button>
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


