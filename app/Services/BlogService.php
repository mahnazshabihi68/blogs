<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class BlogService
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function getAll()
    {
        return $this->blogRepository->getAllBlogs();
    }

    public function getById($id)
    {
        return $this->blogRepository->getBlog($id);
    }

    public function create(array $request)
    {
        return $this->blogRepository->createBlog($request);
    }

    public function update($id, array $request)
    {
        $blog = $this->blogRepository->updateBlog($id, $request);

        return $blog;
    }

    public function delete($id)
    {
        return $this->blogRepository->deleteBlog($id);
    }
}
