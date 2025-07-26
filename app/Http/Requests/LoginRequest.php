<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'    => 'required|regex:/^[\w\.\-]+@[\w\-]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|string|min:8'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'وارد کردن ایمیل الزامی است',
            'password.required' => 'وارد کردن پسورد الزامی است',
            'email.regex'       => 'فرمت ایمیل وارد شده اشتباه است',
            'password.min'      => 'پسورد باید حداقل دارای ۸ کاراکتر باشد'
        ];
    }
}
