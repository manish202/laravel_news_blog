<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.headtag')
    <title>Add User</title>
</head>
<body>
    <div class="container">
        @include('admin.header')
        <h2 class="text-capitalize p-3">add user</h2>
    </div>
    <form autocomplete="off" action="{{ route('admin.add_user_data') }}" class="w-50 m-auto bg-light p-3 text-capitalize" method="post">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label class="form-label">first name</label>
            <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{old('fname')}}">
            @error('fname')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">last name</label>
            <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{old('lname')}}">
            @error('lname')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">user name</label>
            <input type="text" class="form-control @error('uname') is-invalid @enderror" name="uname" value="{{old('uname')}}">
            @error('uname')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
            <input type="password" class="form-control @error('pword') is-invalid @enderror" name="pword" value="{{old('pword')}}">
            @error('pword')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">role</label>
            <select name="role" class="form-select @error('role') is-invalid @enderror">
                <option selected disabled>choose role</option>
                <option value="1">admin</option>
                <option value="2">normal</option>
            </select>
            @error('role')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark d-block">Save</button>
    </form>
</body>
</html>