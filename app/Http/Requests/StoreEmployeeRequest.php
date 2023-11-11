<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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

        if(is_super_admin()){
            return  [
                'company_id' => 'required',
                'email'                    => 'required|email|unique:users,email',
                'password'                 => 'required|min:8',
                'password_confirmation'    => 'required|same:password',
                'name'                     => 'required',
                'employee_id'              => 'required|unique:employees,employee_id',
                'department_id'            => 'required',
                'designation'              => 'required',
                'joining_date'             => 'required',
                'phone_2'                  => 'required'
            ];
        }
        return [
            'email'                    => 'required|email|unique:users,email',
            'password'                 => 'required|min:8',
            'password_confirmation'    => 'required|same:password',
            'name'                     => 'required',
            'employee_id'              => 'required|unique:employees,employee_id',
            'department_id'            => 'required',
            'designation'              => 'required',
            'joining_date'             => 'required',
            'phone_2'                  => 'required'


        ];

    }
}
