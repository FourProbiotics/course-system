@extends('layouts.admin')

@section('title')
    新建作业
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">后台管理</a></li>
            <li><a href="{{ url('/admin/homework') }}">作业管理</a></li>
            <li class="active">新建</li>
        </ol>
        <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
            @if ($errors->hasBag('default'))
                <span class="help-block">
                    <strong>{{ $errors->first() }}</strong>
                </span>
            @endif
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="inputTitle" class="col-sm-2 control-label">标题</label>
                <div class="col-sm-4">
                    <input type="text" name="title" class="form-control" id="inputTitle" placeholder="作业标题">
                </div>
            </div>
            <div class="form-group">
                <label for="inputCourse" class="col-sm-2 control-label">课程</label>
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
                <label for="inputTime" class="col-sm-2 control-label">截止日期</label>
                <div class="col-sm-4">
                    <input type="date" name="deadline" class="form-control" id="inputTime" placeholder="截止日期">
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">作业内容</label>
                <div class="col-sm-8">
                    <script id="content" name="content" type="text/plain"></script>
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">示例代码</label>
                <div class="col-sm-8">
                    <textarea rows="5" name="code" class="form-control" id="inputContent"
                              placeholder="作业内容"></textarea>
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
                    <button type="submit" class="btn btn-primary">发布作业</button>
                </div>
            </div>
        </form>
    </div>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('content');
    </script>
@endsection