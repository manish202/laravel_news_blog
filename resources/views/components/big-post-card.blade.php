<div class='card mb-3 text-capitalize'>
    <div class='row g-0'>
        <div class='col-md-4'>
            <a href='{{ route('post').'/'.$post->pid }}'><img src='{{ asset('storage/images').'/'.$post->pimage }}' class='img-fluid p-3 fit'></a>
        </div>
        <div class='col-md-8'>
            <div class='card-body'>
                <h5 class='card-title'><a href='{{ route('post').'/'.$post->pid }}'>{{substr($post->ptitle,0,60).".."}}</a></h5>
                <div class='py-2'>
                    <a href='{{ route('category').'/'.$post->cid }}' class='mx-1'><i class='fa-solid fa-tags'></i> {{$post->cname}}</a><a href='{{ route('author').'/'.$post->uid }}' class='mx-1'><i class='fa-solid fa-user'></i> {{$post->fname}}</a><span class='mx-1'><i class='fa-solid fa-calendar'></i> {{convertDateFormat($post->created_at,'d-M-Y')}}</span>
                </div>
                <p class='card-text'>{{substr($post->pdesc,0,100)."..."}}</p>
            </div>
            <a href='{{ route('post').'/'.$post->pid }}' class='btn btn-primary float-end mx-4'>read more</a>
        </div>
    </div>
</div>