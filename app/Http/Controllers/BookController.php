<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cart;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index () {
        $books = Book::paginate(24);
        return view('books.index')
            ->withBooks($books);
    }

    public function show (Book $book) {
        return view('books.show')
            ->withBook($book);
    }

    public function addToCart (Request $request, Book $book) {
        Cart::current()->add($book, $request->quantity);
        return back();
    }
}
