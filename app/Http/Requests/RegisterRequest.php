<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class RegisterRequest extends FormRequest
{
    private function getRoles()
    {
        return Role::whereNotIn('name', ['super_admin', 'admin'])
            ->pluck('id')
            ->toArray();
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'            => 'required|string|max:255',
            'last_name'             => 'required|string|max:255',
            'phone'                 => 'required|string|unique:users,phone|regex:/^09\d{9}$/',
            'email'                 => 'required|regex:
                                       /^[\w\.\-]+@[\w\-]+\.[a-zA-Z]{2,}$/|unique:users,email',
            'password'              => 'required|string|min:8|confirmed',
            'role'                  => ['required', Rule::in($this->getRoles())],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'     => 'وارد کردن نام الزامی است',
            'first_name.max'          => 'بیشتر از ۲۵۵ کاراکتر برای نام نمیتوان وارد کرد',
            'last_name.required'      => 'وارد کردن نام خانوادگی الزامی است',
            'last_name.max'           => 'بیشتر از ۲۵۵ کاراکتر برای نام خانوادگی نمیتوان وارد کرد',
            'phone.required'          => 'وارد کردن شماره تلفن الزامی است',
            'phone.unique'            => 'این شماره تلفن قبلا وارد شده است',
            'phone.regex'             => 'فرمت شماره تلفن وارد شده درست نیست',
            'email.required'          => 'وارد کردن ایمیل الزامی است',
            'email.unique'            => 'این ایمیل قبلا وارد شده است',
            'email.regex'             => 'فرمت وارد شده ایمیل غلط است',
            'password.required'       => 'وارد کردن پسورد الزامی است',
            'password.min'            => 'پسورد باید حداقل دارای ۸ کاراکتر باشد',
            'password.confirmed'      => 'پسورد اولیه با تکرار آن مطابقت ندارد',
            'role.in'                 => 'نقش وارد شده معتبر نیست',
            'role.required'           => 'انتخاب کردن نقش الزامی است'
        ];
    }
}
