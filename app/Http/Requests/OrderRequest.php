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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'name' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Phone Number is required!',
            'name.required' => 'Full Name is required!',
            'address.required' => 'Billings Address is required!',
        ];
    }
}
