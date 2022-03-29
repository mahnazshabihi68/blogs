<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Services\BlogService;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class BlogController extends Controller
{
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $blogs = $this->blogService->getAll();
        return $blogs;
    }

    public function show($id)
    {
        try {
            $blog = $this->blogService->getById($id);
            if(is_object($blog)) $result = ['status' => 200, 'data' => $blog];
        } catch (Exception $e) {
            $result = ['status' => 500, 'message' => $e->getMessage()];
        }

        return $result;
    }

    public function create(BlogRequest $request)
    {
        $input = $request->all();
        return $this->blogService->create($input);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        return $this->blogService->update($id, $input);
    }

    public function delete($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->blogService->delete($id);
        } catch(Throwable $e){
            $result = [
                'status'    => 500,
                'error'     => $e->getMessage()      
            ];
        }
        
        return $result;
    }
}
