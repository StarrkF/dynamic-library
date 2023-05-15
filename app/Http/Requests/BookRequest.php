<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// use Illuminate\Http\Exceptions\HttpResponseException;
// use Illuminate\Contracts\Validation\Validator;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('books')],
            'author' => 'required',
            'type_id' => 'required',
            'list_type_id' => 'required',
            'status' =>  'nullable',
            'in_library' => 'nullable',
            'author_slug' => 'nullable',
            'publisher' => 'nullable',
            'page_count' => 'nullable',
            'buy_date' => 'nullable',
            'read_date' => 'nullable'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'İsim',
            'author' => 'Yazar',
            'type_id' => 'Kitap Türü',
            'list_type_id' => 'Listelenecek Bölüm'
        ];
    }

    // public function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([
    //         'success'   => false,
    //         'message'   => 'Doğrulama Hatası',
    //         'data'      => $validator->errors()
    //     ]));
    // }
}
