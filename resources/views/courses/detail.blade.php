@extends('layouts.app')

@section('title')
    课程详情
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="{{ url('/courses') }}">全部课程</a></li>
            <li class="active">{{$course_info->course_name}}</li>
        </ol>
        <div style="width: 100%;">
            <div class="pull-left" style="width: 46em;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span>Databases, JavaScript, Ajax 和 PHP</span> 课程介绍</h3>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>教师</th>
                            <th>学期</th>
                            <th>开课学院</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">{{$course_info->course_id}}</th>
                            <td>{{$course_info->teacher_name}}</td>
                            <td>{{$course_info->course_term}}</td>
                            <td>{{$course_info->course_college}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="panel-body" style="max-height: 40em;overflow: auto;">
                        <div class="course-item">
                            <div class="title">课程简介</div>
                            <div class="content">
                                {{$course_info->course_content}}
                            </div>
                        </div>
                        <div class="course-item">
                            <div class="title">教学大纲</div>
                            <div class="content">
                                {{$course_info->teach_outline}}
                            </div>
                        </div>
                        <div class="course-item">
                            <div class="title">教学计划</div>
                            <div class="content">
                                <?php echo $course_info->teach_plan; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pull-right" style="width: 32em;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">课程资源</h3>
                    </div>
                    <div class="panel-body" style="max-height: 18em;overflow: auto;padding: 0;">
                        @if (Auth::guest())
                            <p style="text-align: center;"><a href="{{ url('/login') }}">登录</a>后才能查看</p><!-- 未登录时显示 -->
                        @else
                            @if(!$resource)
                                <p style="text-align: center;">空空如也</p>
                            @else
                                <table class="table table-td-padding-2" style="font-size: 0.9em;"><!-- 登录后显示 -->
                                    <thead>
                                    <tr>
                                        <th>名称</th>
                                        <th>上传时间</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($resource as $key => $val)
                                        <tr>
                                            <td><a href="{{ url('/resource/'.$val->id) }}">{{$val->file_name}}</a>
                                            </td>
                                            <td>{{$val->add_time}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="pull-right" style="width: 32em;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">评论/留言</h3>
                    </div>
                    @if ($errors->hasBag('default'))
                        <span class="help-block">
                            <strong>{{ $errors->first() }}</strong>
                        </span>
                    @endif
                    <div class="panel-body">
                        <form class="form-inline" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="sr-only" for="inputContent">内容</label>
                                <input style="width: 25em;" type="text" class="form-control" name="content"
                                       placeholder="评论/留言内容">
                            </div>
                            @if (Auth::guest())
                                <button type="submit" disabled="disabled" class="btn btn-danger btn-xs">请先登录</button>
                            @else
                                <button type="submit" class="btn btn-primary">发布</button>
                            @endif
                            <!-- 登录后允许评论 -->
                        </form>
                    </div>
                    <div class="panel-body" style="padding: 0;max-height: 18.4em;overflow: auto;">
                        <table class="table table-td-padding-2" style="font-size: 0.9em;">
                            <tbody>
                            @foreach($comments as $key => $val)
                            <tr>
                                <td>
                                    <span>{{$val->content}}</span>
                                    <span class="course-comment-item">{{$val->user_info->name}}@ {{$val->add_time}}</span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
@endsection
