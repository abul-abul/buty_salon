<?php

namespace App\Http\Requests\admin;

use App\Http\Requests\Request;

class AdminSalonRequest extends Request
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
            'name' => 'required',
            'firstname' => 'required',
            'position' => 'required',
            'sub_domain' => 'required|unique:salons',
            'email' => 'required|unique:users',
            'address1' => 'required',
            'password' => 'required'
        ];
    }
}
