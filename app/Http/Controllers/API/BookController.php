<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Contracts\Repository\BookRepositoryInterface;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        $books = $this->bookRepository->all();
        return response()->json(['status' => 'success', 'message' => 'Books retrieved successfully', 'data' => $books], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = $this->bookRepository->create($validatedData);
        return response()->json(['status' => 'success', 'message' => 'Book created successfully', 'data' => $book], 200);
    }

    public function show($id)
    {
        $book = $this->bookRepository->find($id);
        if (!$book) {
            return response()->json(['status' => 'fail', 'message' => 'Book not found'], 404);
        }
        return response()->json(['status' => 'success', 'message' => 'Book retrieved successfully', 'data' => $book], 200);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = $this->bookRepository->update($validatedData, $id);
        return response()->json(['status' => 'success', 'message' => 'Book updated successfully', 'data' => $book], 200);
    }

    public function destroy($id)
    {
        $this->bookRepository->delete($id);
        return response()->json(['status' => 'success', 'message' => 'Book deleted successfully'], 200);
    }
}
