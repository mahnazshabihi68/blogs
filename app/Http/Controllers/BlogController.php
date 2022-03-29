<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Services\BlogService;
use App\Traits\ApiResponses;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class BlogController extends Controller
{
    use ApiResponses;

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
        return $this->blogService->getById($id);
    }

    public function create(BlogRequest $request)
    {
        $input = $request->all();
        return $this->blogService->create($input);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();

        try {
            $this->blogService->update($id, $input);
            $result = $this->successResponse(null, 'success', 200);
        } catch (Throwable $e) {
            $result = [
                'status'    => 500,
                'error'     => $e->getMessage()
            ];
        }

        return $result;
    }

    public function delete($id)
    {
        try {
            $result = [
                'data' =>  $this->blogService->delete($id),
                'status' => 200
            ];
        } catch (Throwable $e) {
            $result = [
                'status'    => 500,
                'error'     => $e->getMessage()
            ];
        }

        return $result;
    }
}
