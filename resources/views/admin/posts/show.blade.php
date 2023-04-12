<h1>
    Detalhes do post {{$post->title}}
</h1>

<ul>
    <li><strong>Titulo: </strong>{{$post->title}}</li>
    <li><strong>Conteudo: </strong>{{$post->content}}</li>
</ul>

<form action="{{route('posts.destroy', $post->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar o Post {{$post->title}}</button>
</form>

<a href="{{route('posts.index')}}">Voltar</a> |
<a href="{{route('posts.edit', $post->id)}}">Editar</a>

