<?php

namespace App\Http\Requests;

class LibraryStoreRequest extends Request
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
                'min:3',
                'max:60',
            ],
            'address' => [
                'required',
                'string',
                'min:15',
                'max:255',
            ],
        ];
    }
}
