<div class="container">
    <h1>Liste des posts</h1>
    @foreach($posts as $post)
        <p>Title: {{ $post->title }}</p>
        <p>Description</p>
        {{ $post->description }}
    @endforeach
</div>