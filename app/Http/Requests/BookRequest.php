<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'type_id' => 'required',
            'list_type_id' => 'required',
            'status' =>  'nullable',
            'in_library' => 'nullable',
            'name' => 'nullable',
            'author' => 'nullable',
            'author_slug' => 'nullable',
            'publisher' => 'nullable',
            'page_count' => 'nullable',
            'buy_date' => 'nullable',
            'read_date' => 'nullable'
        ];
    }
}
