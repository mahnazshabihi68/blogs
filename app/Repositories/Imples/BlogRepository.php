<?php

namespace App\Repositories\Imples;

use App\Repositories\Interfaces\IBlogRepository;
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
        $blog = $this->blog::where('_id', $id)->first();

        return $blog;
    }

    public function createBlog(array $request)
    {
        return $this->blog->create($request);
    }

    public function updateBlog($id, array $request)
    {
        $blog = $this->blog::where('_id', $id)->first();

        if ($blog)
            $blog = $blog::where('_id', $id)->update([
                'title'         => $request['title'],
                'description'   => $request['description']
            ]);

        return $blog;
    }

    public function deleteBlog($id)
    {
        $blog = $this->blog::where('_id', $id)->first();

        if ($blog) $blog->delete();

        return $blog;
    }
}
