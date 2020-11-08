<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierEligibilityRequest extends FormRequest
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
            'mayor_permit_number'                    => 'required',
            'mayor_permit_date_issue'                => 'required',
            'mayor_permit_date_expiration'           => 'required',
            'philgeps_number'                        => 'required', 
            'philgeps_date_issue'                    => 'required',
            'philgeps_date_expiration'               => 'required',
            'sec_dti_number'                         => 'required',
            'sec_dti_date_issue'                     => 'required',
            'sec_dti_date_expiration'                => 'required',
            'tax_clearance_number'                   => 'required',
            'tax_clearance_date_issue'               => 'required',
            'tax_clearance_date_expiration'          => 'required',
            'omnibus_date_issue'                     => 'required',
            'omnibus_date_expiration'                => 'required',
            'bir_cor_number'                         => 'required',
            'bir_cor_date_issue'                     => 'required',
             
        ];
    }
}
