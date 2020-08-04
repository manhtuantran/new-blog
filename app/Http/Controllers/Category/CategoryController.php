<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get All
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return response()->json([
            'status code' => '200',
            'message'     => 'Successfully!',
            'data'        => $categories
        ], 200);
    }

    /**
     * Find By Id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);
        if($category) {
            return response()->json([
                'status code' => '200',
                'message'     => 'Successfully!',
                'data'        => $category
            ], 200);
        }
        return response()->json([
            'status code' => '404',
            'message'     => 'Not Found'
        ], 404);
    }

    /**
     * Create
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $category = $this->categoryRepository->create($request->all());
        if($category) {
            return response()->json([
                'status code' => '201',
                'message'     => 'Successfully!'
            ], 201);
        }
        return response()->json([
            'status code' => '403',
            'message'     => 'Failed!'
        ], 403);
    }

    /**
     * Update
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $category = $this->categoryRepository->update($id, $request->all());
        if($category) {
            return response()->json([
                'status code' => '200',
                'message'     => 'Successfully!'
            ],200);
        }
        return response()->json([
            'status code' => '403',
            'message'     => 'Failed!'
        ],403);
    }

    /**
     * Delete
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $category = $this->categoryRepository->delete($id);
        if($category) {
            return response()->json([
                'status code' => '200',
                'message'     => 'Successfully!'
            ],200);
        }
        return response()->json([
            'status code' => '403',
            'message'     => 'Failed!'
        ],403);
    }
}
