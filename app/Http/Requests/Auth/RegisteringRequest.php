<?php

namespace App\Http\Requests\Auth;

use App\Enums\UserRoleEnum;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisteringRequest extends FormRequest
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
            'password' => [
                'bail',
                'required',
                'string',
                'min:0',
                'max:255',
            ],
            'role' => [
                'required',
                Rule::in([
                    UserRoleEnum::APPLICANT,
                    UserRoleEnum::HR,
                ])
            ],
        ]; 
    }

    public function messages(){
        return [
            'required' => ':attribute Bắt buộc phải điền',
            'string' => ':attribute Bắt buộc phải là chuỗi',
        ];
    }

    public function attributes(){
        return [
            'password' => 'Password',
        ];
    }
}
