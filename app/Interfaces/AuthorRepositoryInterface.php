<?php

namespace App\Interfaces;

interface AuthorRepositoryInterface
{
    public function showAllAuthors();
    public function showOneAuthor($id);
    public function delete($id);
    public function create($request);
    public function update($id, $request);
}