<?php

namespace App\Http\Controllers;

use App\Contracts\Repository\AuthorRepositoryInterface;
use Illuminate\Http\Request;
use App\Contracts\Repository\BookRepositoryInterface;

class BookController extends Controller
{
    protected $bookRepository, $authorRepository;

    public function __construct(BookRepositoryInterface $bookRepository, AuthorRepositoryInterface $authorRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->authorRepository = $authorRepository;
    }
    public function index()
    {
        $books = $this->bookRepository->all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = $this->authorRepository->all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = $this->bookRepository->create($validatedData);

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = $this->bookRepository->find($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = $this->bookRepository->find($id);
        $authors = $this->authorRepository->all();
        return view('books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = $this->bookRepository->update($validatedData, $id);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->bookRepository->delete($id);

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');}
}
