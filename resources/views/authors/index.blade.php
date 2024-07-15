@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mb-3">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Authors</span>
                        <a href="{{ route('authors.create') }}" class="btn btn-sm btn-success">Add Author</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->email }}</td>
                                        <td>{{ $author->description ? Str::limit($author->description, 50, '...') : 'NA' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('authors.show', $author->id) }}"
                                                class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('authors.edit', $author->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
