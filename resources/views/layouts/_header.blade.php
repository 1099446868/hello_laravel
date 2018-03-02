<!--在文件名前面加上下划线，是为了指定该视图文件为局部视图文件，为局部视图增加前缀下划线是『约定俗成』的做法-->
<header class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="col-md-offset-1 col-md-10">
            <a href="{{ route('home')  }}" id="logo">Sample app</a>
            <nav>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('help') }}">帮助</a></li>
                    <li><a href="#">登录</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>