<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::where('user_id', Auth::id())->filter()->orderBy('id', 'desc')->paginate(100);
        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book = new Book($request->validated());
        $book->user_id = auth()->user()->id;
        $book->author_slug = $request->author;
        $book->save();
        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->fill($request->validated());
        $book->author_slug = $request->author;
        $book->save();
        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        return $book->delete() ? new JsonResponse(['data' => 'success']) : new JsonResponse(['data' => 'failed'], 400);
    }
}
