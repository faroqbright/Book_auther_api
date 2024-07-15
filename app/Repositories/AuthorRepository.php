<?php

namespace App\Repositories;

use App\Contracts\Repository\AuthorRepositoryInterface;
use App\Models\Author;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function __construct(private Author $author)
    {
    }
    public function all()
    {
        return $this->author->with('books')->get();
    }

    public function create(array $data)
    {
        $author = $this->author->create($data);
        return $author->load('books');
    }

    public function find($id)
    {
        return $this->author->with('books')->find($id);
    }

    public function update(array $data, $id)
    {
        $author = $this->author->find($id);
        $author->update($data);
        return $author->load('books');
    }

    public function delete($id)
    {
        return $this->author->destroy($id);
    }
}
