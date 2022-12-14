@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Authors') }}</div>

            <div class="card-body">
                <a href="{{ route('authors.create') }}" class="btn btn-primary">Create New Authors</a>
                <div class="mt-3">
                    <h3>List of Authors</h3>
                    <ul class="list-group">
                        @forelse ($authors as $author)
                            <li class="list-group-item">{{ $author->name }}
                                <span class="d-flex float-right">
                                    <a href="{{ route('authors.edit', [$author]) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                    <form action="{{ route('authors.destroy', [$author]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </span>
                            </li>
                        @empty
                            <li class="list-group-item">No Author added yet</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection