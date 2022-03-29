<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        try {
            $blog = $this->blogRepository->updateBlog($id, $request);
        } catch (Exception $e) {
            echo $e;
        }

        return $blog;
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $blog = $this->blogRepository->deleteBlog($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete');
        }

        DB::commit();

        return $blog;
    }
}
