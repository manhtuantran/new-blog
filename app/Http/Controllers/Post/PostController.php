<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\PostInterface;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

//    404	Not Found (page or other resource doesn’t exist)
//    401	Not authorized (not logged in)
//    403	Logged in but access to requested area is forbidden
//    400	Bad request (something wrong with URL or parameters)
//    422	Unprocessable Entity (validation failed)
//    500	General server error

    /**
     * Get All
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $posts = $this->postRepository->getAll();
        return response()->json($posts, 200);
    }
}
