@extends('layout')
@include('uitility')
@section('title_desc')
    <title>{{$data->ptitle}}</title>
    <meta name="description" content="hey! here you can read amazing blogs related to sports,music,dance etc...">
@endsection
@section('main_content')
    <div class="col-md-9 text-primary text-capitalize">
        <h2>{{$data->ptitle}}</h2>
        <div class='py-2'>
            <a href='{{ route('category').'/'.$data->cid }}' class='mx-1'><i class='fa-solid fa-tags'></i> {{$data->cname}}</a><a href='{{ route('author').'/'.$data->uid }}' class='mx-1'><i class='fa-solid fa-user'></i> {{$data->fname." ".$data->lname}}</a><span class='mx-1'><i class='fa-solid fa-calendar'></i> {{convertDateFormat($data->created_at,'d-M-Y')}}</span>
        </div>
        <img src="{{ asset('storage/images').'/'.$data->pimage }}" class="rounded mx-auto d-block w-50 my-5" alt="...">
        <p class="text-dark">{{$data->pdesc}}</p>
    </div>
@endsection