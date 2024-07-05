<?php

namespace App\Repositories;

use App\Contracts\Repository\BookRepositoryInterface;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    public function __construct(private Book $book)
    {
    }
    public function all()
    {
        return $this->book->all();
    }

    public function create(array $data)
    {
        return $this->book->create($data);
    }

    public function find($id)
    {
        return $this->book->find($id);
    }

    public function update(array $data, $id)
    {
        $book = $this->book->find($id);
        $book->update($data);
        return $book;
    }

    public function delete($id)
    {
        return $this->book->destroy($id);
    }
}
