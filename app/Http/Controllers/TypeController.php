<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            Type::create(['name' => $request->type_name ]);
            return back()->with('success', 'Yeni Kitap Türü Eklendi');
        } catch (\Throwable $th) {
            return back()->with('error', 'Kitap Türü Eklenemedi');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new JsonResponse(Type::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return Type::where('id', $id)->update(['name' => $request->name ])
        ? back()->with('success', 'Kitap Türü Güncellendi')
        : back()->with('success', 'Kitap Türü Güncellenemedi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Type::where('id', $id)->delete()
        ? back()->with('success', 'Kitap Türü Silindi')
        : back()->with('success', 'Kitap Türü Silinemedi');
    }
}
