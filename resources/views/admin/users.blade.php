@extends('admin.layout')
@section('content')
    <div class="row align-items-center">
        <div class="col-md-9"><h2 class="text-capitalize p-3">all users</h2></div>
        <div class="col-md-3"><a href="{{ route('admin.add_user') }}" class="btn btn-dark">add user</a></div>
    </div>
    <div class="row">
        <table class="table text-center table-hover text-capitalize">
            <thead>
                <tr>
                    <th>uid</th>
                    <th>full name</th>
                    <th>username</th>
                    <th>role</th>
                    <th>total posts</th>
                    <th>created</th>
                    <th>updated</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $val)
                    <tr>
                        <td>{{$val->uid}}</td>
                        <td>{{$val->fname." ".$val->lname}}</td>
                        <td>{{$val->uname}}</td>
                        <td>{!! $val->role == 1 ? "<span class='badge bg-primary text-white'>Admin</span>":"<span class='badge bg-secondary text-white'>Normal</span>" !!}</td>
                        <td>{{$val->post_under_user}}</td>
                        <td>{{$val->created_at}}</td>
                        <td>{{$val->updated_at}}</td>
                        <td><a href='{{ route('admin.edit_user').'/'.$val->uid }}' class='btn btn-success mx-2 text-capitalize'>edit</a><a href='{{ route('admin.del_user').'/'.$val->uid }}' class='btn btn-danger text-capitalize'>delete</a></td>
                    </tr>
                @empty
                    <tr><td colspan="7">No Records</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center my-3">
            {{$data->links()}}
        </div>
    </div>
@endsection