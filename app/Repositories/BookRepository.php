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
        return $this->book->with('author')->get();
    }

    public function create(array $data)
    {
        $book= $this->book->create($data);
         return $book->load('author');
    }

    public function find($id)
    {
        return $this->book->with('author')->find($id);
    }

    public function update(array $data, $id)
    {
        $book = $this->book->find($id);
        $book->update($data);
        return $book->load('author');
    }

    public function delete($id)
    {
        return $this->book->destroy($id);
    }
}
