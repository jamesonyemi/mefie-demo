<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'company_name'      =>  'required|string|unique:customers|max:255',
            'phone_number'      =>  'required|string|phone',
            'email'             =>  'required|string|email|unique:users|unique:customers|max:255',
            'password'          =>  'required|string|min:8|',
            'invoice_limit'     =>  'required|numeric|min:1|max:12',
        ];
    }
}