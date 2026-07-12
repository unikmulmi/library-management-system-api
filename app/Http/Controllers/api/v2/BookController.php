<?php

namespace App\Http\Controllers\api\v2;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{

    public function getFiveBooks()
    {
        $books = Book::latest()->take(5)->get();

        return BookResource::collection($books);
    }

}
