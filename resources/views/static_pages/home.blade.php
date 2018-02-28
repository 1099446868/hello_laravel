@extends('layouts.default')
<!--使用extends()传参来继承layouts/default.blade.php视图-->

@section('title','')
    <!--注意的是，当 section 传递了第二个参数时，便不需要再通过 stop 标识来告诉 Laravel 填充区块会在具体哪个位置结束。-->

@section('content')
    <!--使用section和stop来填充父视图占位区域-->
    <h1>主页</h1>
@stop
@section('url')
    <a href="http://sample.test/help">帮助</a>
    <a href="http://sample.test/about">关于</a>
@stop