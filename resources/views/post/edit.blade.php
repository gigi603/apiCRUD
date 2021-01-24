<div class="container">
    <form action="{{route('post.update', $post->id)}}" method="POST">
        @method('PUT')
        @csrf
        <label>Title</label>
        <input type="text" name="title" value='{{ $post->title }}'/>
        <label>Description</label>
        <textarea rows="15" cols="20" name="description">{{ $post->description }}</textarea>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
    <form action="{{url('post', $post->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</a>
    </form>
</div>