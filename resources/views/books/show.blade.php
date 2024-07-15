@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ $book->title }}</span>
                            <a href="{{ route('books.index') }}" class="btn btn-primary">Back to List</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <h4> <strong>Title: </strong> {{ $book->title }}</h4>
                        <p> <strong>Description: </strong> {{ $book->description }}</p>
                        <p> <strong>Author: </strong> {{ $book->author->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
