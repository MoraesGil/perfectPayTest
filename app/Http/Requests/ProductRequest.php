<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

        switch ($this->method()) {
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|max:45',
                    'price' => 'required|numeric',
                    'description' => 'nullable|max:45'
                ];

            default:
                return [];
        }
    }
}
