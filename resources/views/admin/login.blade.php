<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.headtag')
    <title>Login page</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 logo text-center"><h1><a href="{{ route('admin.login') }}">news blog</a></h1></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <h2 class="text-capitalize p-3">Login form</h2>
            </div>
        </div>
        <div class="row">
            <form autocomplete="off" action="{{ route('admin.login') }}" class="w-50 m-auto bg-light p-3 text-capitalize" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label class="form-label">username</label>
                    <input type="text" class="form-control @error('uname') is-invalid @enderror" name="uname" required>
                    @error('uname')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">password</label>
                    <input type="password" class="form-control @error('pword') is-invalid @enderror" name="pword" required>
                    @error('pword')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-dark d-block" value="login" name="login">
            </form>
        </div>
    </div>
</body>
</html>