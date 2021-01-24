<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAllPost()
    {
        return $this->post->get();
    }

    public function getById($id)
    {
        return $this->post
            ->find($id);
    }

    public function save($data)
    {
        $post = new $this->post;

        $post->title = $data['title'];
        $post->description = $data['description'];

        $post->save();

        return $post->fresh();
    }

    public function update($data, $id)
    {
        $post = $this->post->find($id);

        $post->title = $data['title'];
        $post->description = $data['description'];

        $post->update();

        return $post;
    }

    public function destroy($id)
    {
        $post = $this->post->find($id);
        $post->delete();

        return $post;
    }
}