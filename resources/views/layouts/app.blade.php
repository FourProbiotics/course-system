<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{setting('site_name')}}</title>

    <!-- Fonts -->
    <link href="https://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="http://fonts.useso.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ URL::asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/css/custom.css') }}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato', serif;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{setting('site_name')}}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">首页</a></li>
                <li><a href="{{ url('/courses') }}">全部课程</a></li>
                <li><a href="{{ url('/announces') }}">公告</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登录</a></li>
                    <li><a href="{{ url('/register') }}">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->uno }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/account/profile') }}">个人信息</a></li>
                            <li><a href="{{ url('/account/change_password') }}">修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/home/courses') }}">我的课程</a></li>
                            <li><a href="{{ url('/home/homework') }}">作业管理 <span class="badge">1</span></a></li>
                            <li><a href="{{ url('/home/messages') }}">消息信息 <span class="badge">4</span></a></li>
                            @if(Auth::user()->group_id == 1)
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/admin') }}">后台管理</a></li>
                            @endif
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/logout') }}">注销</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

@include('UEditor::head');
        <!-- JavaScripts -->
<script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
