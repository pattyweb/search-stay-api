<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Store;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'isbn' => 'required|numeric|unique:books',
            'value' => 'required|numeric',
        ]);

        return Book::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return $book;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'isbn' => 'required|numeric|unique:books,isbn,' . $book->id,
            'value' => 'required|numeric',
        ]);

        $book->update($request->all());

        return $book;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }

    public function attachStore($bookId, $storeId)
    {
        $book = Book::findOrFail($bookId);
        $store = Store::findOrFail($storeId);

        $book->stores()->attach($store);

        return response()->json(['message' => 'Store attached to book successfully']);
    }

    public function detachStore($bookId, $storeId)
    {
        $book = Book::findOrFail($bookId);
        $store = Store::findOrFail($storeId);

        $book->stores()->detach($store);

        return response()->json(['message' => 'Store detached from book successfully']);
    }
}
