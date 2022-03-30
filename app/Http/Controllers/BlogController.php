<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\DTO\ApiResponses;
use App\Services\Interfaces\IBlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $iblogService;

    public function __construct(IBlogService $iblogService)
    {
        $this->iblogService = $iblogService;
    }

    public function index()
    {
        $blogs = $this->iblogService->getAll();
        return $blogs;
    }

    public function show($id)
    {
        $result = $this->iblogService->getById($id);

        return isset($result['status']) ? ApiResponses::errorResponse('error', $result['status']) : ApiResponses::successResponse($result, 'success', 200);
    }

    public function create(BlogRequest $request)
    {
        $input = $request->all();
        return $this->iblogService->create($input);
    }

    public function update($id, Request $request)
    {
        $input = $request->all();

        $result = $this->iblogService->update($id, $input);
        return $result['status'] == 200 ? ApiResponses::successResponse(null, 'success', $result['status']) : ApiResponses::errorResponse('error', $result['status']);
    }

    public function delete($id)
    {
        $result = $this->iblogService->delete($id);

        return $result['status'] == 200 ? ApiResponses::successResponse(null, 'success', $result['status']) : ApiResponses::errorResponse('error', $result['status']);
    }
}
