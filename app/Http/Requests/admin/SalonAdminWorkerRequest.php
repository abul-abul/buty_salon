<?php

namespace App\Http\Requests\admin;

use App\Http\Requests\Request;

class SalonAdminWorkerRequest extends Request
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
            'firstname' => 'required',
            'lastname'  => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'profession' => 'required',
        ];
    }

    /**
     * Make changes before sending data
     *
     * @return array
     */
    // public function inputs()
    // {
    //     $inputs = $this -> except('_token');
    //     if(!$inputs['password']){
    //            unset($inputs['password']);
    //     }else{
    //         $inputs['password'] = bcrypt($inputs['password']);
    //     }
    //     return $inputs;
    // }
}
