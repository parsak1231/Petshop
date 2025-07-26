<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EditRoleRequest extends FormRequest
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
        $role_id = $this->role->id;
        $role_name = $this->role->name;
        return [
            'label' => 'required|string|max:255|unique:roles,label,'.$role_id,
            'name'  => in_array($role_name, ['super_admin', 'admin', 'seller', 'customer'])
            ? 'prohibited' : 'required|string|max:255|unique:roles,name,'.$role_id,
        ];
    }

    public function messages(): array
    {
        return [
            'label.required'    => 'وارد کردن اسم نقش الزامی است',
            'label.max'         => 'بیشتر از ۲۵۵ کاراکتر نمیتوان برای نقش وارد کرد',
            'label.unique'      => 'این نقش قبلا ثبت شده است',
            'name.required'     => 'وارد کردن اسم نقش سیستمی الزامی است',
            'name.unique'       => 'این نقش سیستمی قبلا ثبت شده است',
            'name.max'          => 'بیشتر از ۲۵۵ کاراکتر نمیتوان برای نقش سیستمی وارد کرد',
            'name.prohibited'   => 'امکان تغییر این فیلد برای نقش‌های سیستمی وجود ندارد'
        ];
    }
}
