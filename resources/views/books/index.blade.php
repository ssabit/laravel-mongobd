@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Books') }}</div>

            <div class="card-body">
                <a href="{{ route('books.create') }}" class="btn btn-primary">Create a New Book</a>
                <div class="mt-3">
                    <h3>List of Books</h3>
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Pages</th>
                            <th>Author Name</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($books as $book)
                            <tr>
                                <td>{{ $book->name }}</td>
                                <td>৳ {{ $book->price }}</td>
                                <td>{{ $book->pages }}</td>
                                <td>{{ $book->author->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('books.edit', [$book]) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                                    <form action="{{ route('books.destroy', [$book]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Book Added Yet</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
