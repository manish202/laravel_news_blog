@extends('admin.layout')
@section('content')
    <div class="row align-items-center">
        <div class="col-md-9"><h2 class="text-capitalize p-3">all posts</h2></div>
        <div class="col-md-3"><a href="{{ route("admin.add_post") }}" class="btn btn-dark">add post</a></div>
    </div>
    <div class="row">
        <table class="table text-center table-hover text-capitalize">
            <thead>
                <tr>
                    <th>pid</th>
                    <th>image</th>
                    <th>title</th>
                    <th>description</th>
                    <th>category</th>
                    <th>author</th>
                    <th>created</th>
                    <th>updated</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $val)
                    <tr>
                        <td>{{$val->pid}}</td>
                        <td><img src='{{ asset('storage/images').'/'.$val->pimage }}' class='rounded'></td>
                        <td>{{substr($val->ptitle,0,20)."..."}}</td>
                        <td>{{substr($val->pdesc,0,30)."..."}}</td>
                        <td>{{$val->cname}}</td>
                        <td>{{$val->fname." ".$val->lname}}</td>
                        <td>{{$val->created_at}}</td>
                        <td>{{$val->updated_at}}</td>
                        <td><a href='{{ route('admin.edit_post').'/'.$val->pid }}' class='btn btn-success mx-2 text-capitalize'>edit</a><a href='{{ route('admin.del_post').'/'.$val->pid }}' class='btn btn-danger text-capitalize'>delete</a></td>
                    </tr>
                @empty
                    <tr><td colspan="9">No Records</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center my-3">
            {{$data->links()}}
        </div>
    </div>
@endsection