<?php

namespace App\Repository;

use App\Models\Post;

class PostRepository 
{
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAll()
    {
        return $this->post->get();
    }
    public function findByid($id)
    {
        $post = Post::where('id', $id)->firstOrfail();
        return ($post);
    }

    public function save($data)
    {
        $post = new $this->post;

        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->save();
        return $post->fresh();
    }
}