<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;  //注意这里app首字母要大写 App
use App\Models\User;

class UsersController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function show(User $user){
        return view('users.show',compact('user'));
    }
    //Laravel 会自动解析定义在控制器方法（变量名匹配路由片段）中的 Eloquent 模型类型声明。在上面代码中，
    //由于 show() 方法传参时声明了类型 —— Eloquent 模型 User，
    //对应的变量名 $user 会匹配路由片段中的 {user}，这样，Laravel 会自动注入与请求 URI 中传入的 ID 对应的用户模型实例。
    /*此功能称为 『隐性路由模型绑定』，是『约定优于配置』设计范式的体现，同时满足以下两种情况，此功能即会自动启用：
        1.路由声明时必须使用 Eloquent 模型的单数小写格式来作为路由片段参数，User 对应 {user}：
        2.控制器方法传参中必须包含对应的 Eloquent 模型类型声明，并且是有序的

    当请求 http://sample.test/users/1 并且满足以上两个条件时，Laravel 将会自动查找 ID 为 1 的用户并赋值到变量 $user 中,
    如果数据库中找不到对应的模型实例，会自动生成 HTTP 404 响应
    我们将用户对象 $user 通过 compact 方法转化为一个关联数组，并作为第二个参数传递给 view 方法，将数据与视图进行绑定。
    */

    /**
     * @param Request $request 是Illuminate\Http\Request 实例参数
     * 注册表单数据验证，    unique:users  针对users表进行唯一性验证，confirmed:密码匹配验证，验证两次输入是否一致
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password' => bcrypt($request->password)
        ]);

        Auth::login($user); //在 Laravel 中，如果要让一个已认证通过的用户实例进行登录,可实现注册后自动登录

        //$data = $request->all();获取用户的所有信息
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');   //flash()方法让这个session会话只在下一次的请求内有效
        return redirect()->route('users.show', [$user]);
        /*
         * 注意这里是一个『约定优于配置』的体现，此时 $user 是 User 模型对象的实例。route() 方法会自动获取 Model 的主键，
         * 也就是数据表 users 的主键 id，以上代码等同于：
redirect()->route('users.show', [$user->id]);
         */
    }
}
