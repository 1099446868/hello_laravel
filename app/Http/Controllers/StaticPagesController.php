<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home(){

        //view('视图路径'，'可选：与视图绑定的数据')
        return view('static_pages/home');
        //以上将会渲染 /resources/views/static_pages/home.blade.php文件
    }

    public function help(){
        return view('static_pages/help');
    }

    public function about(){
        return view('static_pages/about');
    }
}
