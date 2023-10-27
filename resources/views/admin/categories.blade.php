@extends('admin.layout')
@section('title')
    <title>All Categories</title>
@endsection
@section('content')
    <div class="row align-items-center">
        <div class="col-md-9"><h2 class="text-capitalize p-3">all categories</h2></div>
        <div class="col-md-3"><a href="{{ route('admin.add_cat') }}" class="btn btn-dark">add category</a></div>
    </div>
    <div class="row">
        <table class="table text-center table-hover text-capitalize">
            <thead>
                <tr>
                    <th>cid</th>
                    <th>name</th>
                    <th>total posts</th>
                    <th>created</th>
                    <th>updated</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $val)
                    <tr>
                        <td>{{$val->cid}}</td>
                        <td>{{$val->cname}}</td>
                        <td>{{$val->post_under_cat}}</td>
                        <td>{{$val->created_at}}</td>
                        <td>{{$val->updated_at}}</td>
                        <td><a href='{{ route('admin.edit_cat').'/'.$val->cid }}' class='btn btn-success mx-2 text-capitalize'>edit</a><a href='{{ route('admin.del_cat').'/'.$val->cid }}' class='btn btn-danger text-capitalize'>delete</a></td>
                    </tr>
                @empty
                    <tr><td colspan="6">No Records</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center my-3">
            {{$data->links()}}
        </div>
    </div>
@endsection