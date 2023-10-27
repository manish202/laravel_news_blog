<div class='card mt-3 text-capitalize'>
    <div class='row g-0'>
        <div class='col-md-4'>
            <a href='{{ route('post').'/'.$post->pid }}'><img src='{{ asset('storage/images').'/'.$post->pimage }}'></a>
        </div>
        <div class='col-md-8'>
            <div class='card-body'>
                <a href='{{ route('post').'/'.$post->pid }}'>{{substr($post->ptitle,0,20).".."}}</a>
                <div class='py-1'>
                    <a href='{{ route('category').'/'.$post->cid }}' class='mx-1'><i class='fa-solid fa-tags'></i> {{$post->cname}}</a><span class='mx-1'><i class='fa-solid fa-calendar'></i> {{convertDateFormat($post->updated_at,'M-Y')}}</span>
                </div>
            </div>
            <a href='{{ route('post').'/'.$post->pid }}' class='btn btn-primary btn-sm float-end mx-4'>read more</a>
        </div>
    </div>
</div>