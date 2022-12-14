@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Edit Book') }}</div>
            <div class="card-body">
                <form action="{{ route('books.update', [$book]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $book->name }}">
                    </div>
                    <div class="form-group">
                        <label for="pages">Pages</label>
                        <input type="text" name="pages" class="form-control" id="pages"
                            value="{{ $book->pages }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price"
                            value="{{ $book->price }}">
                    </div>
                    <div class="form-group">
                        <label for="author_id">Authors</label>
                        <select name="author_id" id="author_id" class="form-control">
                            @forelse ($authors as $author)
                                <option value="{{ $author->id }}">
                                    @if ($book->author->id === $author->id)
                                    @endif{{ $author->name }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
