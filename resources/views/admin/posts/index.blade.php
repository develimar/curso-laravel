@extends('admin.posts.layouts.app')

@section('title', 'Listagem dos Posts')
@section('content')
    <a href="{{route('posts.create')}}">Criar novo Post</a>
    <hr>
    @if(session('message'))
        {{session('message')}}
    @endif

    <form action="{{route('posts.search')}}" method="post">
        @csrf
        <input type="text" name="search" id="search" placeholder="Filtrar">
        <button type="submit">Filtrar</button>
    </form>
    <h1>Posts</h1>

    @foreach($posts as $post)
        <p>
            <img src="{{url("storage/{$post->image}")}}" alt="{{$post->title}}" style="max-width: 100px">
            {{ $post->title }} |
            <a href="{{route('posts.show', $post->id)}}">Ver Detalhes</a> |
            <a href="{{route('posts.edit', $post->id)}}">Editar Registro</a>
        </p>
    @endforeach

    <hr>
    @if(isset($filters))
        {{$posts->appends($filters)->links()}}
    @else
        {{$posts->links()}}
    @endif
@endsection
