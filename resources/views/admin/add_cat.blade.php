<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.headtag')
    <title>Add Category</title>
</head>
<body>
    <div class="container">
        @include('admin.header')
        <h2 class="text-capitalize p-3">add category</h2>
    </div>
    <form autocomplete="off" action="{{ route('admin.add_cat_data') }}" class="w-50 m-auto bg-light p-3 text-capitalize" method="post">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label class="form-label">Category name</label>
            <input type="text" class="form-control @error('cname') is-invalid @enderror" name="cname">
            @error('cname')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark d-block">Save</button>
    </form>
</body>
</html>