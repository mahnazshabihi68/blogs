<?php

namespace App\Services\Interfaces;

interface IBlogService
{
    public function getAll();
    public function getById(object $id);
    public function create(array $request);
    public function update(object $id, array $request);
    public function delete(object $id);
}
