<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository
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
        return $this->blog::where('_id', $id)->first();
    }

    public function createBlog(array $request)
    {
        return $this->blog->create($request);
    }

    public function updateBlog($id, array $request)
    {
        $blog = $this->blog::where('_id', $id)->first();

        $blog::where('_id', $id)->update([
            'title'         => $request['title'],
            'description'   => $request['description'],
            'updated_at'    => now()
        ]);

        return $blog;
    }

    public function deleteBlog($id)
    {
        $blog = $this->blog::where('_id', $id)->first();

        $blog->delete();

        return $blog;
    }
}
