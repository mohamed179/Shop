<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'first_name' => 'required|string|max:10',
            'last_name' => 'required|string|max:10',
            'email' => 'nullable|email',
            'address' => 'required|string|max:100',
            'address2' => 'nullable|string|max:100',
            'billing_country' => 'required|string|max:2',
            'billing_state' => 'nullable|string|max:15',
            'shipping_country' => 'nullable|string|max:2',
            'shipping_state' => 'nullable|string|max:15',
            'zip' => 'required|postal_code_for:billing_country,shipping_country',
        ];
    }
}
