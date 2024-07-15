@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ $author->name }}</span>
                            <a href="{{ route('authors.index') }}" class="btn btn-primary">Back to List</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <h4> <strong>Name: </strong> {{ $author->name }}</h4>
                        <p> <strong>Email: </strong> {{ $author->email }}</p>
                        <p> <strong>Description: </strong> {{ $author->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
