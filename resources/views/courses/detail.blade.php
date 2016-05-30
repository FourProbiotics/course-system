@extends('layouts.app')

@section('title')
    课程详情
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">全部课程</a></li>
            <li class="active">Databases, JavaScript, Ajax 和 PHP</li>
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
                            <th scope="row">22210</th>
                            <td>徐利锋</td>
                            <td>2016/2017(1)</td>
                            <td>计算机学院</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="panel-body" style="max-height: 40em;overflow: auto;">
                        <div class="course-item">
                            <div class="title">课程简介</div>
                            <div class="content"><p>PHP是超级文本预处理语言Hypertext Preprocessor的缩写。PHP
                                    是一种HTML内嵌式的语言，是一种在服务器端执行的嵌入HTML文档的脚本语言，语言的风格有类似于C语言，被广泛的运用。PHP文件一般由专业程序开发人员编写。</p>
                            </div>
                        </div>
                        <div class="course-item">
                            <div class="title">教学日历</div>
                            <div class="content"><p><img src="http://202.120.143.134/Download/20150918154248001.jpg">
                                </p></div>
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
                        <p class="hidden" style="text-align: center;">登录后才能查看</p><!-- 未登录时显示 -->
                        <table class="table table-td-padding-2" style="font-size: 0.9em;"><!-- 登录后显示 -->
                            <thead>
                            <tr>
                                <th>名称</th>
                                <th>上传时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="{{ url('/resource/1') }}">Chapter1. PHP is the best programing language</a>
                                </td>
                                <td>2016-03-03</td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('/resource/1') }}">Chapter2. PHP is the best programing language</a>
                                </td>
                                <td>2016-03-03</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="pull-right" style="width: 32em;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">评论/留言</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-inline">
                            <div class="form-group">
                                <label class="sr-only" for="inputContent">内容</label>
                                <input style="width: 25em;" type="text" class="form-control" id="inputContent"
                                       placeholder="评论/留言内容">
                            </div>
                            <button type="submit" disabled="disabled" class="btn btn-primary">发布</button>
                            <!-- 登录后允许评论 -->
                        </form>
                    </div>
                    <div class="panel-body" style="padding: 0;max-height: 18.4em;overflow: auto;">
                        <table class="table table-td-padding-2" style="font-size: 0.9em;">
                            <tbody>
                            <tr>
                                <td>
                                    <span>留言内容留言内容留言内容留言内容留言内容留言内容留言内容</span>
                                    <span class="course-comment-item">小明@2016-06-06</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>留言内容留言内容留言内容留言内容留言内容留言内容留言内容</span>
                                    <span class="course-comment-item">小明@2016-06-06</span>
                                </td>
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
