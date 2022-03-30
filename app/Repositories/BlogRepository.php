<?php

namespace App\Repositories;

use App\Interfaces\IBlogRepository;
use App\Models\Blog;

class BlogRepository implements IBlogRepository
{
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function getAllBlogs()
    {
        return $this->blog->get();
    }

    public function getBlog($id)
    {
        $blog = $this->blog::where('id', $id)->first();
        if (!$blog) return ['status' => 404];

        return $blog;
    }

    public function createBlog(array $request)
    {
        return $this->blog->create($request);
    }

    public function updateBlog($id, array $request)
    {
        $blog = $this->blog::where('id', $id)->first();
        if (!$blog) return ['status' => 404];

        $blog::where('id', $id)->update([
            'title'         => $request['title'],
            'description'   => $request['description']
        ]);

        return ['status' => 200];
    }

    public function deleteBlog($id)
    {
        $blog = $this->blog::where('id', $id)->first();
        if (!$blog) return ['status' => 404];

        $blog->delete();

        return ['status' => 200];
    }
}
