<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class ResetPasswordRequest extends FormRequest
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
//            'old_password'          => 'required|string|min:6|max:50',
            'password'              => 'required|string|min:6|max:50|confirmed',
            'password_confirmation' => 'required_with:password|same:password',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
//            'old_password.required'                 => Lang::get('auth.alert.empty_password'),
//            'old_password.string'                   => Lang::get('auth.alert.format_password'),
//            'old_password.min'                      => Lang::get('auth.alert.length_password'),
//            'old_password.max'                      => Lang::get('auth.alert.length_password'),
            'password.required'                     => Lang::get('auth.alert.empty_password'),
            'password.string'                       => Lang::get('auth.alert.format_password'),
            'password.min'                          => Lang::get('auth.alert.length_password'),
            'password.max'                          => Lang::get('auth.alert.length_password'),
            'password_confirmation.required_with'   => Lang::get('auth.alert.empty_password_confirm'),
            'password_confirmation.same'            => Lang::get('auth.alert.different_password'),
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [];
    }
}