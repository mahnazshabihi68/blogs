<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Services\BlogService;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
       return $this->blogService->getAll();
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
        return $this->blogService->update($id, $input);
    }

    public function delete($id)
    {
        return $this->blogService->delete($id);
    }
}
