@extends('layouts.app')

@section('title')
    公告详情
@stop

@section('content')
    <div id="main-width">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="#">公告</a></li>
            <li class="active">这是公告的标题</li>
        </ol>
        <h2 style="margin: 1.5em 0 0.5em 0;text-align: center;">这是公告的标题</h2><!-- 标题 -->
        <div style="text-align: center; font-size: 0.9em; color: #858585;">2016-05-01 10:10:10</div><!-- 时间 -->
        <div style="border-top: 1px solid #DDD;margin-top: 1em;padding: 1em;"><!-- 内容部分，此处只有管理员可用，我认为不用防止XSS -->
            <p style="line-height: 2em;">
                基因测序公司Ancestry.com和23andMe去年透露，他们收到了执法机构的DNA信息提供要求。现在，两家公司公布了政府透明度报告，称总共收到了5次请求，索要了6个人的私人遗传信息。Ancestry.com为一起谋杀和强奸18岁女孩的调查而交出了一个人的遗传信息；23andMe则收到了4次法庭命令，但说服调查人员撤回了请求。两家公司表示来自执法机构的遗传数据请求非常罕见。但隐私倡导人士和专家担心，个人出于医学、家庭历史搜索或其它的交给的遗传数据会被调查人员误用。</p>
        </div>
    </div>
@endsection