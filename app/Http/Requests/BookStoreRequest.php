<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class BookStoreRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'isbn' => [
                'sometimes',
                'string',
                'min:10',
                'max:13'
            ],
            'name' => [
                'exclude_unless:isbn,null',
                'required',
                'string',
                'max:100'
            ],
            'year' => [
                'exclude_unless:isbn,null',
                'required',
                'integer',
            ],
            'author_id' => [
                'exclude_unless:isbn,null',
                'required',
                Rule::exists('authors', 'id')
            ],
        ];
    }
}
