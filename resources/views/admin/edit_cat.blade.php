<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.headtag')
    <title>Edit Category</title>
</head>
<body>
    <div class="container">
        @include('admin.header')
        <h2 class="text-capitalize p-3">edit category</h2>
    </div>
    <form autocomplete="off" action="{{ route('admin.edit_cat_data') }}" class="w-50 m-auto bg-light p-3 text-capitalize" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Category name</label>
            <input type="hidden" value="{{$data[0]->cid}}" name="cid">
            <input type="text" class="form-control @error('cname') is-invalid @enderror" name="cname" value="{{$data[0]->cname}}">
            @error('cname')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark d-block">Update</button>
    </form>
</body>
</html>