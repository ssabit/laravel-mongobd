<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }


    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'max: 100|required',
                'price' => 'max: 100|required',
                'pages' => 'max: 100|required',
                'author_id' => 'max: 100|required',
            ]
        );

        Book::create([
            'name' => $request->name,
            'price' => $request->price,
            'pages' => $request->pages,
            'author_id' => $request->author_id,


        ]);
        return redirect()->route('books.index');
    }


    public function show(Book $book)
    {
        //
    }


    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }


    public function update(Request $request, Book $book)
    {
        $request->validate(
            [
                'name' => 'max: 100|required',
                'price' => 'max: 100|required',
                'pages' => 'max: 100|required',
                'author_id' => 'max: 100|required',
            ]
        );

        $book->update([
            'name' => $request->name,
            'price' => $request->price,
            'pages' => $request->pages,
            'author_id' => $request->author_id,


        ]);
        return redirect()->route('books.index');
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
