<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.headtag')
    <title>Edit Post</title>
</head>
<body>
    <div class="container">
        @include('admin.header')
        <h2 class="text-capitalize p-3">Edit post</h2>
    </div>
    <form enctype="multipart/form-data" autocomplete="off" action="{{ route('admin.edit_post_data') }}" class="w-50 m-auto bg-light p-3 text-capitalize" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="pid" value="{{$data->pid}}">
        <input type="hidden" name="old_img" value="{{$data->pimage}}">
        <input type="hidden" name="old_cat" value="{{$data->pcat}}">
        <div class="mb-3">
            <label class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$data->ptitle}}">
            @error('title')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">description</label>
            <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" cols="30" rows="5">{{$data->pdesc}}</textarea>
            @error('desc')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">thumbnail</label>
            <input type="file" class="form-control" name="thumb">
            @error('thumb')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">old thumbnail</label><br>
            <img src="{{ asset('storage/images').'/'.$data->pimage }}" class="img-thumbnail w-50">
        </div>
        <div class="mb-3">
            <label class="form-label">category</label>
            <select name="cat" class="form-select">
                @forelse ($categories as $cat)
                @php
                    $selected = $cat->cid == $data->pcat ? "selected":"";
                @endphp
                <option {{$selected}} value="{{$cat->cid}}">{{$cat->cname." ($cat->post_under_cat)"}}</option>
                @empty
                <option selected disabled>No categories found.</option>
                @endforelse
            </select>
            @error('cat')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark d-block">Update</button>
    </form>
</body>
</html>