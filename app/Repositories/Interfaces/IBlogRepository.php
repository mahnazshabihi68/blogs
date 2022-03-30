<?php

namespace App\Repositories\Interfaces;

interface IBlogRepository
{
    public function getAllBlogs();
    public function getBlog(object $id);
    public function createBlog(array $request);
    public function updateBlog(object $id, array $request);
    public function deleteBlog(object $id);
}

