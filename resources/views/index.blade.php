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
                        <tr>
                            <th scope="row">22210</th>
                            <td>
                                <a href="./course.php">Databases, JavaScript, Ajax 和 PHP</a>
                            </td>
                            <td>徐利锋</td>
                            <td>计算机学院</td>
                        </tr>
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
                            <tr>
                                <td><a href="#">这是公告的标题</a></td>
                                <td>2016-04-04 10:20:30</td>
                            </tr>
                            <tr>
                                <td><a href="#">这是公告的标题</a></td>
                                <td>2016-04-04 10:20:30</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
@endsection