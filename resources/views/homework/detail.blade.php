@extends('layouts.app')

@section('title')
    作业详情
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">用户中心</a></li>
            <li><a href="#">作业管理</a></li>
            <li><a href="#">t2.实现简单微博</a></li>
            <li class="active">详情</li>
        </ol>
        <div style="margin-top: 1em; border-top: 1px solid #DDD; padding: 1em;">
            <form class="form-horizontal" action="#" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">课程名</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">Databases, JavaScript, Ajax 和 PHP</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">作业</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">t2.实现简单微博</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">老师</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">徐利锋</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">截止时间</label>
                    <div class="col-sm-10">
                        <p class="form-control-static">2016-04-04 23:59:59</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">作业内容</label>
                    <div class="col-sm-10">
                        <div class="form-control-static"><p>
                                基因测序公司Ancestry.com和23andMe去年透露，他们收到了执法机构的DNA信息提供要求。现在，两家公司公布了政府透明度报告，称总共收到了5次请求，索要了6个人的私人遗传信息。Ancestry.com为一起谋杀和强奸18岁女孩的调查而交出了一个人的遗传信息；23andMe则收到了4次法庭命令，但说服调查人员撤回了请求。两家公司表示来自执法机构的遗传数据请求非常罕见。但隐私倡导人士和专家担心，个人出于医学、家庭历史搜索或其它的交给的遗传数据会被调查人员误用。</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">附件</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><a href="#">原文件名</a></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <hr>
                        <a href="{{ url('/homework/submit/1') }}" class="btn btn-primary">提交作业</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
