<?php

namespace App\Http\Controllers;

use App\Book;
use App\Mobile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $mobiles = Mobile::all();
        return view('home')
            ->withBooks($books)
            ->withMobiles($mobiles);
    }
}
