<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title','Blog')</title>
</head>
<body>
    @yield('content')
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/contact">Contact</a></li>
        <li> <a href="/about">About</a></li>
    </ul>
</body>
</html>