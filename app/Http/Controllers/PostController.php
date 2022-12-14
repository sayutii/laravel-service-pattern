<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\Repository\PostRepository;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;
    protected $postRepository;

    public function __construct(
        PostService $postService,
        PostRepository $postRepository

        ){
            $this -> postService = $postService;
            $this -> postRepository = $postRepository;
        }


    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this -> postService-> getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'description',
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->store($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function show($id)
    {
        $post = $this->postRepository->findByid($id);
        return $post;
    }
}
