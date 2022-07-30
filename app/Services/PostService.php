<?php 

namespace App\Services;

use App\Models\Post;
use App\Repository\PostRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function store($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->postRepository->save($data);

        return $result;
    }

    public function findByid($id)
    {
        $post = Post::where('id', $id)->firstOrfail();
        return ($post);
    }
}