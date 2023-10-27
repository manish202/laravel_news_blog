<div class="row align-items-center logo">
    <div class="col-md-4"><h1><a href="{{ route('admin.blog_posts') }}">news blog</a></h1></div>
    <div class="col-md-5"><h5>hii {{session("user_data")->fname." ".session("user_data")->lname}}</h5></div>
    <div class="col-md-3"><h5><a href='{{ route('admin.logout') }}'>logout</a></h5></div>
</div>
<div class="row">
    <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
        <div class="container-fluid">
            <ul class="navbar-nav">
                @php
                    $menu = [
                        "posts" => "admin.blog_posts",
                        "categories" => "admin.categories",
                        "users" => "admin.users"
                    ];
                    if(session("user_data")->role == 2){
                        $menu = ["posts" => "admin.blog_posts"];
                    }
                @endphp
                @foreach ($menu as $key=>$val)
                    <li class='nav-item text-uppercase'>
                        <a class='nav-link {{request()->route()->getName() == $val ? 'active':''}}' href='{{ route($val) }}'>{{$key}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>