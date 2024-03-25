<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
        $uniqueRule = 'unique:users';

        if($this->method() == 'PATCH'){
        $uniqueRule = 'unique:users,email,'.$this->user.',id';
        }

        return [
        'name' => 'required',                              ///  all $uniqueRule to $emailRule in postgres
        'email' => 'required|email|'.$uniqueRule,
        'password' => 'required|min:6',
        ];
    }
}
