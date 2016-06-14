@extends('layouts.app')

@section('title')
    首页
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="#">PHP课程网站</a></li>
            <li class="active">首页</li>
        </ol>
        <div style="width: 100%;">
            <div class="pull-left" style="width: 46em;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">最新课程</h3>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>课程名</th>
                            <th>教师</th>
                            <th>学院</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($courses as $key => $val) {?>
                        <tr>
                            <th scope="row">{{$val->course_id}}</th>
                            <td>
                                <a href="/course/{{$val->course_id}}/">{{$val->course_name}}</a>
                            </td>
                            <td>{{$val->teacher_name}}</td>
                            <td>{{$val->course_college}}</td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pull-right" style="width: 32em;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">最新公告</h3>
                    </div>
                    <div class="panel-body" style="max-height: 18em;overflow: auto;padding: 0;">
                        <table class="table table-td-padding-2" style="font-size: 0.9em;">
                            <thead>
                            <tr>
                                <th>标题</th>
                                <th>时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($announces as $key => $val) {?>
                            <tr>
                                <td><a href="/announces/{{$val->id}}/">{{$val->title}}</a></td>
                                <td>{{$val->update_time}}</td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
@endsection