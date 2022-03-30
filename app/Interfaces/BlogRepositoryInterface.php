<?php

namespace App\Interfaces;

interface BlogRepositoryInterface
{
    public function getAllBlogs();
    public function getBlog(object $id);
    public function createBlog(array $request);
    public function updateBlog(object $id, array $request);
    public function deleteBlog(object $id);
}
