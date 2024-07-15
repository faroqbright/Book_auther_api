<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Repository\AuthorRepositoryInterface;

class AuthorController extends Controller
{
    public function __construct(private AuthorRepositoryInterface $authorRepository)
    {
    }
    public function index()
    {
        $authors = $this->authorRepository->all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'nullable|string',
        ]);

        $author = $this->authorRepository->create($validatedData);
        return redirect()->route('authors.index')->with('success', 'Author created successfully');
    }

    public function show(string $id)
    {
        $author = $this->authorRepository->find($id);
        return view('authors.show', compact('author'));
    }

    public function edit(string $id)
    {
        $author = $this->authorRepository->find($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'nullable|string',
        ]);

        $author = $this->authorRepository->update($validatedData, $id);
        return redirect()->route('authors.index')->with('success', 'Author updated successfully');
    }

    public function destroy(string $id)
    {
        $this->authorRepository->delete($id);
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
    }
}
