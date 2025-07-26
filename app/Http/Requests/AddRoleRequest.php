<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'label'      => 'required|string|max:255|unique:roles,label',
            'name'       => 'required|string|max:255|unique:roles,name'
        ];
    }

    public function messages(): array
    {
        return [
            'label.required'    => 'وارد کردن نام نقش الزامی است',
            'label.unique'      => 'این نقش قبلا در سیستم ثبت شده است',
            'label.max'         => 'بیشتر از ۲۵۵ کاراکتر نمیتوان برای نام نقش وارد کرد',
            'name.required'     => 'وارد کردن نام سیستمی نقش الزامی است',
            'name.unique'       => 'این نقش(سیستمی) قبلا در سیستم ثبت شده است',
            'name.max'          => 'بیشتر از ۲۵۵ کاراکتر نمیتوان برای نام سیستمی وارد کرد'
        ];
    }
}
