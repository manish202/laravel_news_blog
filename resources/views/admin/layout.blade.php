<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.headtag')
    @yield('title')
</head>
<body>
    <div class="container">
        @include('admin.header')
        @yield('content')
    </div>
</body>
</html>