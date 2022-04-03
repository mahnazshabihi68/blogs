<?php

namespace App\Services\Imples;

use App\Events\BlogEvent;
use App\Repositories\Interfaces\IBlogRepository;
use App\Services\Interfaces\IBlogService;

class BlogService implements IBlogService
{
    protected $iblogRepository;

    public function __construct(IBlogRepository $iblogRepository)
    {
        $this->iblogRepository = $iblogRepository;
    }

    public function getAll()
    {
        return $this->iblogRepository->getAllBlogs();
    }

    public function getById($id)
    {
        $blog = $this->iblogRepository->getBlog($id);
        if (!$blog) return ['status' => 404];

        return $blog;
    }

    public function create(array $request)
    {
        event(new BlogEvent('blog created'));
        
        return $this->iblogRepository->createBlog($request);
    }

    public function update($id, array $request)
    {
        $blog = $this->iblogRepository->updateBlog($id, $request);
        if (!$blog) return ['status' => 404];
        
        event(new BlogEvent('blog updated'));

        return ['status' => 200];
    }

    public function delete($id)
    {
        $blog = $this->iblogRepository->deleteBlog($id);
        if (!$blog) return ['status' => 404];
        event(new BlogEvent('blog deleted'));

        return ['status' => 200];
    }
}

