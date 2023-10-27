<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css_js/color.css') }}">
    @yield('title_desc')
</head>
<body>
    <div class="container-fluid">
        <div class="row logo">
            <div class="col-md-4 m-auto text-center"><h1><a href="/">news blog</a></h1></div>
        </div>
        <div class="row">
            <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
                <div class="container-fluid">
                    <ul class="navbar-nav text-uppercase m-auto">
                        @foreach ($categories as $cat)
                        @php
                            $active = isset($cur_cat->cid) && $cur_cat->cid == $cat->cid ? 'active':'';
                        @endphp
                        <li class='nav-item'><a class='nav-link {{$active}}' href='{{ route('category').'/'.$cat->cid }}'>{{$cat->cname}} ({{$cat->post_under_cat}})</a></li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            @yield('main_content')
            <div class="col-md-3">
                <form id="serach" class="row g-2 search-form" autocomplete="off">
                    <h3>search</h3>
                    <div class="col-auto">
                        <input type="text" id="term" class="form-control" placeholder="search">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">search</button>
                    </div>
                </form>
                @php
                    $path = route('search');
                @endphp
                <script>
                    var path = @json($path);
                    document.getElementById('serach').onsubmit = function(e){
                        e.preventDefault();
                        var term = document.getElementById("term").value.trim();
                        if(term.length < 50 && term.length > 2){
                            location.assign(path+"/"+term);
                        }else{
                            alert("search characters must be greater then 2 and less then 50");
                        }
                    }
                </script>
                <div class="recent-posts mt-4 mb-5">
                    <h3>recent posts</h3>
                    @forelse ($recent_posts as $post)
                    <x-small-post-card :post="$post" />
                    @empty
                        <div class="alert alert-warning">No Posts Found.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center text-capitalize bg-dark text-white p-3">
        <h4>all copyright &copy; 2023-24 reserved.</h4>
        <h5>design & developed by manish prajapati</h5>
    </footer>
</body>
</html>