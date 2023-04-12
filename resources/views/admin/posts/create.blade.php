@extends('admin.posts.layouts.app')
@section('title', 'Novo Post')
@section('content')
    <h1>Cadastrar Novo Post</h1>

    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.posts._partials.form')
    </form>
@endsection
