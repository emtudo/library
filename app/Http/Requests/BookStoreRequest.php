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
            'name' => [
                'required',
                'string',
                'max:100'
            ],
            'year' => [
                'required',
                'integer',
            ],
            'author_id' => [
                'required',
                Rule::exists('authors', 'id')
            ],
        ];
    }
}
