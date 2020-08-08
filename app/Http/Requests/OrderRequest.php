<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'email|required',
            'shipping_address_1' => 'email|required',
            'shipping_address_2' => 'string|nullable|max:255',
            'shipping_address_3' => 'string|nullable|max:255',
            'city' => 'string|required|max:255',
            'country_code' => 'string|nullable|max:3',
            'zip_postal_code' => 'string|nullable|max:6',
            'products' => 'array'
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'E-mail',
            'shipping_address_1' => 'Shipping Address 1',
            'shipping_address_2' => 'Shipping Address 2',
            'shipping_address_3' => 'Shipping Address 3',
            'city' => 'Ciy',
            'country_code' => 'Country code',
            'zip_postal_code' => 'ZIP Postal Code',
        ];
    }
}
