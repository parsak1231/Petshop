<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
        return ['title' => 'required|string|max:255|unique:categories,title,'.$this->category->id];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'وارد کردن دسته بندی الزامی است',
            'title.max' => 'بیشتر از ۲۵۵ کاراکتر نمیتوان برای دسته بندی وارد کرد',
            'title.unique' => 'این دسته بندی قبلا در سیستم ثبت شده است'
        ];
    }
}
