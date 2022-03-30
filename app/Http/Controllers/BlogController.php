<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Services\BlogService;
use App\DTO\ApiResponses;
use Illuminate\Http\Request;

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
        $result = $this->blogService->getById($id);

        return isset($result['status']) ? ApiResponses::errorResponse('error', $result['status']) : ApiResponses::successResponse($result, 'success', 200);
    }

    public function create(BlogRequest $request)
    {
        $input = $request->all();
        return $this->blogService->create($input);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();

        $result = $this->blogService->update($id, $input);
        return $result['status'] == 200 ? ApiResponses::successResponse(null, 'success', $result['status']) : ApiResponses::errorResponse('error', $result['status']);
    }

    public function delete($id)
    {
        $result = $this->blogService->delete($id);

        return $result['status'] == 200 ? ApiResponses::successResponse(null, 'success', $result['status']) : ApiResponses::errorResponse('error', $result['status']);
    }
}
