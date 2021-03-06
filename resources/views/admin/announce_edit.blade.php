@extends('layouts.admin')

@section('title')
    编辑公告
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="{{ url('/admin/announces') }}">后台管理</a></li>
            <li class="active">公告管理</li>
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
                    <input type="text" value="{{$announce->title}}" name="title" class="form-control" id="inputTitle"
                           placeholder="公告标题">
                </div>
            </div>
            <div class="form-group">
                <label for="inputClass" class="col-sm-2 control-label">类型</label>
                <div class="col-sm-2">
                    <input type="text" value="{{$announce->type}}" name="type" class="form-control" id="inputClass"
                           placeholder="公告类型">
                    <p class="help-block">如：系统，规则.</p>
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-sm-2 control-label">内容</label>
                <div class="col-sm-8">
                    <script id="content" name="content" type="text/plain"><?php echo $announce->content; ?></script>
                </div>
            </div>
            <div class="form-group">
                <label for="inputFile" class="col-sm-2 control-label">附件</label>
                <div class="col-sm-8">
                    @if(isset($announce->resource))
                        @foreach($announce->resource as $key => $val)
                            <p class="form-control-static"><a
                                        href="{{ url('/download/'.$val->id) }}">{{$val->file_name}}</a></p>
                        @endforeach
                    @endif
                    <input type="file" name="file" id="inputFile">
                    <p class="help-block">支持格式： {{get_config('allowed_upload_types')}}</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <hr>
                    <button type="submit" class="btn btn-primary">保存公告</button>
                </div>
            </div>
        </form>
    </div>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('content');
    </script>
@endsection