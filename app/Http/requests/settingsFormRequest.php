<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class settingsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return U_TRUNCATED_CHAR_FOUND;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validate = [
            'email' => 'required|email|unique:suppliers,email,'.$this->id,
            'password' => 'nullable|string',
        ];

        if(auth()->user()->supplier_id)
        {
            $validate['photo'] = 'nullable|image';
            $validate['address'] = 'required';
            $validate['sales_representative'] = 'required';
            $validate['contact_number'] = 'required';
        }

 
        return $validate;
    }
}
