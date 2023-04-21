<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ListType;
use App\Models\Type;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::get();
        $list_types = ListType::get();
        $statuses = config('constant.books.status');
        $books = Book::with('type', 'list_type')->get();
        return view('pages.books', compact('books', 'types', 'list_types', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Book::create([
                'name' => $request->name,
                'status' => $request->status,
                'type_id' => $request->type_id,
                'list_type_id' => $request->list_type_id,
            ]);
            return back()->with('success', 'Kitap Başarıyla Eklendi');
        } catch (\Throwable $th) {
            return back()->with('error', 'Kitap Eklenemedi');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = Book::where('id', $id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'type_id' => $request->type_id,
            'list_type_id' => $request->list_type_id,
        ]);

        return $update
        ? back()->with('success', 'Kitap Başarıyla Güncellendi')
        : back()->with('error', 'Kitap Güncellenemedi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Book::where('id', $id)->delete()
        ? back()->with('success', 'Kitap Başarıyla Silindi')
        : back()->with('error', 'Kitap Silinemedi');
    }
}
