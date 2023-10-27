@extends('layout')
@include('uitility')
@section('title_desc')
    <title>Search for {{$term}}</title>
    <meta name="description" content="hey! here you can read amazing blogs related to sports,music,dance etc...">
@endsection
@section('main_content')
    <div class="col-md-9">
        <h3 class='text-capitalize pb-2'>Search for {{$term}}</h3>
        @forelse ($data as $post)
        <x-big-post-card :post="$post" />
        @empty
            <div class="alert alert-warning">No Posts Found.</div>
        @endforelse
        <div class="d-flex justify-content-center my-5">
            {{$data->links()}}
        </div>
    </div>
@endsection