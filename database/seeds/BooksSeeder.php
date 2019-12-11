<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($book_no = 1; $book_no <= 100; $book_no++) {
            Book::create([
                'id' => $book_no,
                'slug' => str_random(9) . $book_no,
                'title' => 'Book No. ' . $book_no,
                'sku' => str_random(9) . $book_no,
                'price' => mt_rand(10*10, 100*10) / 10,
                'author' => 'Dr. John Doe',
                'edition' => 'First Edition',
            ]);
        }
    }
}
