<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable; //这是授权相关功能的引用

class User extends Authenticatable
{
    /***begin by xiong*
     *这是消息通知相关功能的引用
     *******end********/
    use Notifiable;

    /***begin by xiong*/
    protected $table = 'users'; //Eloquent模型可以让我们很方便的与数据库进行交互，因此我们需要在Eloque模型中接住$table属性的定义
    //来指明要进行数据交互的数据表的名称
    /*******end********/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /***begin by xiong
     *$fillable用于过滤用户提交的字段，只有在包含该属性的字段才能被正常更新
     *
     *******end********/
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /***begin by xiong
     *当我们需要对用户密码或其他敏感信息在用户用过数组或JSON显示时进行隐藏，可以用hidden
     *
     *******end********/
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*全球通用头像
    该方法主要做了以下几个操作：
为 gravatar 方法传递的参数 size 指定了默认值 100；
通过 $this->attributes['email'] 获取到用户的邮箱；
使用 trim 方法剔除邮箱的前后空白内容；
用 strtolower 方法将邮箱转换为小写；
将小写的邮箱使用 md5 方法进行转码；
将转码后的邮箱与链接、尺寸拼接成完整的 URL 并返回；
     *
     */
    public function gravatar($size = '100'){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }
}
