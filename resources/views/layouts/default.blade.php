<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','Sample')新手入门</title>
    <!--yield（）也可以接受两个参数，第一个是占位参数，第二个是默认值，表示当指定变量的值为空时使用默认值.
    也可以在 yield 区块后面进行内容拼接。让我们标题拥有更加丰富的信息。-->
</head>
<body>
@yield('content')
<!--上面表示该占位区域用于显示content区块的内容，而content区块的内容由继承default视图的子视图定义-->
@yield('url')
</body>
</html>