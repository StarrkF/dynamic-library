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
        $types = Type::withCount('books')->get();
        return ['data' => $types];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = Type::create([
            'name' => $request->name
        ]);

        return ['data' => $type];
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return ['data' => $type];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $type->fill(['name' => $request->name]);
        $type->save();
        return ['data' => $type];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        return $type->delete() ? new JsonResponse(['data' => 'success']) : new JsonResponse(['data' => 'failed'], 400);
    }
}
