<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConstantController extends Controller
{
    public function listTypes()
    {
        $list_types = config('constant.books.list_types');
        return new JsonResponse(['data' => $list_types]);
    }

    public function status()
    {
        $status = config('constant.books.status');
        return new JsonResponse(['data' => $status]);
    }

    public function libraries()
    {
        $libraries = config('constant.books.in_libray');
        return new JsonResponse(['data' => $libraries]);
    }
}
