<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Store::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'active' => 'boolean',
        ]);

        return Store::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $store = Store::findOrFail($id);
        return $store;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $store = Store::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'active' => 'boolean',
        ]);

        $store->update($request->all());

        return $store;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();
        return response()->json(null, 204);
    }

    /**
     * Attach a book to the store.
     */
    public function attachBook($storeId, $bookId)
    {
        $store = Store::findOrFail($storeId);
        $book = Book::findOrFail($bookId);

        $store->books()->attach($book);

        return response()->json(['message' => 'Book attached to store successfully']);
    }

    /**
     * Detach a book from the store.
     */
    public function detachBook($storeId, $bookId)
    {
        $store = Store::findOrFail($storeId);
        $book = Book::findOrFail($bookId);

        $store->books()->detach($book);

        return response()->json(['message' => 'Book detached from store successfully']);
    }
}
