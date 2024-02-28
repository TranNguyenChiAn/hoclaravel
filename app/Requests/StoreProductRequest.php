<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        return [
            'name' => ['required'],
            'price' => ['required', 'regex:/^[0-9]+[0-9.]*$/', 'min:0.1'],
            'quantity' => ['required', 'regex:/^[0-9]+$/', 'min:1'],
            'image' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'price.required' => 'Price is required',
            'price.regex' => 'Price is not correct format',
            'price.min' => 'Price is higher than 0.1',
            'quantity.required' => 'Quantity is required',
            'quantity.regex' => 'Quantity is not correct format',
            'quantity.min' => 'Quantity is higher than 0',
            'image.required' => 'Image is required',
        ];
    }
}
