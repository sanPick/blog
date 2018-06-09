<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>


@include('layout.header');
{{-- 继承后插入的内容 --}}
@yield('content')

{{-- 包含页脚 --}}
@include('layout.footer')

{{--侧边菜单 --}}
@include('layout.left')
</body>
</html>