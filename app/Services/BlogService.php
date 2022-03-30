<?php

namespace App\Services;

use App\Repositories\BlogRepository;

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
        $blog = $this->blogRepository->getBlog($id);

        return $blog;
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
        $blog = $this->blogRepository->deleteBlog($id);

        return $blog;
    }
}
