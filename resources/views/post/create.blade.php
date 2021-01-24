<div class="container">
    <form action="{{route('post.store')}}" method="POST">
        @csrf
        <label>Title</label>
        <input type="text" name="title"/>
        <label>Description</label>
        <textarea rows="15" cols="20" name="description"></textarea>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>