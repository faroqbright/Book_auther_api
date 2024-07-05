<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Contracts\Repository\AuthorRepositoryInterface;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    protected $authorRepository;

    public function __construct(AuthorRepositoryInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function index()
    {
        $authors = $this->authorRepository->all();
        return response()->json(['status' => 'success', 'message' => 'Authors retrieved successfully', 'data' => $authors], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = $this->authorRepository->create($validatedData);
        return response()->json(['status' => 'success', 'message' => 'Author created successfully', 'data' => $author], 200);
    }

    public function show($id)
    {
        $author = $this->authorRepository->find($id);
        if (!$author) {
            return response()->json(['status' => 'fail', 'message' => 'Author not found'], 404);
        }
        return response()->json(['status' => 'success', 'message' => 'Author retrieved successfully', 'data' => $author], 200);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
        ]);

        $author = $this->authorRepository->update($validatedData, $id);
        return response()->json(['status' => 'success', 'message' => 'Author updated successfully', 'data' => $author], 200);
    }

    public function destroy($id)
    {
        $this->authorRepository->delete($id);
        return response()->json(['status' => 'success', 'message' => 'Author deleted successfully'], 200);
    }
}
