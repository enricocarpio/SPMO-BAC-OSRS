<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class SupplierFormRequest extends FormRequest
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
         
        $valid_data = [
            'name' => 'required',  
            'address' =>'required',
            'owner'  => 'required',
            'email' => 'required|email|unique:suppliers,email,'.$this->id,
            'sales_representative' => 'required',
            'contact_number' => 'required',
            'bir_tin_number' => 'required',
            'categories' => 'required',
            'business_type' => 'required',
            
        ];

        if(!Auth::user()) $valid_data['document_file'] = 'required|file|mimes:zip|max:3072';
      
        return $valid_data;
      
    }

    public function messages()
    {
        return[
            'name.required' => 'Name required',
            'address.required' =>'Address required',
            'owner.required' =>'Owner required',
            'email.required' => 'Email addresss required',
            'email.email'   => 'Invalid format email address',
            'email.unique' => 'Email address already exists',
            'sales_representative.required' =>'Sale representative required',
            'bir_tin_number.required' =>'BIR TIN number required',
            'categories.required'     => 'Line of Business required',
            'business_type.required' => 'Business type required',
            'contact_number.required' => 'Contact number required',
        ];
    }
}
