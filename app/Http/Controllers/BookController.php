<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($list_type = null, $author = null)
    {
        $types = Type::get();
        $list_types = config('constant.books.list_types');
        $statuses = config('constant.books.status');
        $perPage = request('perPage', 50);
        $orderBy = request('orderBy', 'asc');
        $books = Book::when($list_type, function($q) use ($list_type) {
            $q->where('list_type_id' ,$list_type);
        })
        ->when($author, function($q) use ($author) {
            $q->where('author_slug' ,$author);
        })
        ->with('type')->filter()->orderBy('id', $orderBy)->paginate($perPage);
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
                'author' => $request->author,
                'author_slug' => $request->author,
                'publisher' => $request->publisher,
                'page_count' => $request->page_count,
                'in_library' => $request->in_library,
                'status' => $request->status,
                'type_id' => $request->type_id,
                'list_type_id' => $request->list_type_id,
                'buy_date' => $request->buy_date,
                'read_date' => $request->read_date,
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
            'author' => $request->author,
            'author_slug' => $request->author,
            'publisher' => $request->publisher,
            'page_count' => $request->page_count,
            'in_library' => $request->in_library,
            'status' => $request->status,
            'type_id' => $request->type_id,
            'list_type_id' => $request->list_type_id,
            'buy_date' => $request->buy_date,
            'read_date' => $request->read_date,
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

    public function authorBook($slug) {
        $types = Type::get();
        $list_types = config('constant.books.list_types');
        $statuses = config('constant.books.status');
        $perPage = request('perPage', 50);
        $orderBy = request('orderBy', 'asc');
        $books = Book::where('author_slug' ,$slug)->with('type')->filter()->orderBy('id', $orderBy)->paginate($perPage);
        return view('pages.books', compact('books', 'types', 'list_types', 'statuses'));
    }

    public function draw() {
        $data  = [];
        while( empty($data) )
        {
            $data = Book::filter()->with('type')->inRandomOrder()->first();
        }
        return new BookResource($data);
    }
}
