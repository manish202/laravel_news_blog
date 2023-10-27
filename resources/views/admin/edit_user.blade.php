<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.headtag')
    <title>Edit User</title>
</head>
<body>
    <div class="container">
        @include('admin.header')
        <h2 class="text-capitalize p-3">edit user</h2>
    </div>
    <form autocomplete="off" action="{{ route('admin.edit_user_data') }}" class="w-50 m-auto bg-light p-3 text-capitalize" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$data[0]->uid}}" name="uid">
        <div class="mb-3">
            <label class="form-label">first name</label>
            <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{$data[0]->fname}}">
            @error('fname')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">last name</label>
            <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{$data[0]->lname}}">
            @error('lname')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">user name</label>
            <input type="text" class="form-control @error('uname') is-invalid @enderror" name="uname" value="{{$data[0]->uname}}">
            @error('uname')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">role</label>
            <select name="role" class="form-select @error('role') is-invalid @enderror">
                <option value="1" {{$data[0]->role == 1 ? "selected":""}}>admin</option>
                <option value="2" {{$data[0]->role == 2 ? "selected":""}}>normal</option>
            </select>
            @error('role')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark d-block">Update</button>
    </form>
</body>
</html>