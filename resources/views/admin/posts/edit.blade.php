<h1>Editar o Post {{$post->title}}</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif

<form action="{{route('posts.update', $post->id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" id="title" placeholder="title" value="{{ $post->title }}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="content">{{$post->content}}</textarea>
    <button type="submit">Enviar</button>
</form>
