<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
//            'id' => 'required|integer|unique:news',
            'title' => 'required|string|unique:news',
            'preview' => 'string',
            'text' =>'string'
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                    'id' => 'required|integer|exists:news',
                    'title' => [
                        'required', Rule::unique('news')->ignore($this->id, 'id')
                    ]
                ] + $rules;
            case 'DELETE':
                return [
                    'id' => 'required|integer|exists:title, id'
                ];
        }
    }
}
