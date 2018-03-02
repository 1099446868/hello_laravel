<?php
/***begin by xiong*/
/*这是默认的迁移文件，用于构建用户表
/*******end********/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /***begin by xiong*/
    /*当我们运行迁移时调用up方法
    /*******end********/
    public function up()
    {
        //调用Schema类的create方法创建用户表，参数一：创建的数据表的名称，参数二：接收 $table（Blueprint的实例） 的闭包
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');   //increments 方法创建一个自增长id
            $table->string('name');     //string 方法创建一个name字段，用于保存用户名
            $table->string('email')->unique();  //unique 方法指定该email字段值是唯一值，用于保存email字段
            $table->string('password'); //string 方法创建一个密码字段，且该字段最大长度为60
            $table->rememberToken();    //rememberToken 方法创建 remember_token字段，用于保存[记住我]的功能
            $table->timestamps();   //timestamps 方法创建一个create_at 和一个 uodate_at 字段，分别用于保存用户的创建时间和更新时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /***begin by xiong
     *当我们运行回滚时调用down，是up方法的逆向操作，会调用Schema 的 drop 方法删除users 表
     *******end********/
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
