<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesRequest extends FormRequest
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
            case 'POST':
            case 'PUT':
            case 'PATCH':
                return [
                    'product_id' => "required|exists:products,id",
                    'date' => 'required|date',
                    "status"=> 'nullable|in:0,1,2',
                    'price' => 'required|numeric',
                    'discount' => 'numeric',
                    'amount' => 'required|numeric'
                ];

            //get porpuse
            default:
                return [
                    "from_date" => "required|date",
                    "to_date" => "required|date"
                ];
        }
    }
}
