<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'category'      => 'required|exists:categories,id',
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'price'         => 'required|integer|min:1000',
            'quantity'      => 'required|integer|min:1',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'        => 'وارد کردن عنوان محصول الزامی است',
            'title.max'             => 'بیشتر از ۲۵۵ کاراکتر نمیتوان برای عنوان وارد کرد',
            'description.required'  => 'وارد کردن توضیحات برای محصول الزامی است',
            'price.required'        => 'وارد کردن قیمت برای محصول الزامی است',
            'price.min'             => 'قیمت محصول باید حداقل ۱۰۰۰ تومان باشد',
            'quantity.required'     => 'وارد کردن تعداد محصولات موجود الزامی است',
            'quantity.min'          => 'تعداد محصول باید حداقل ۱ عدد باشد',
            'quantity.integer'      => 'مقدار وارد شده برای تعداد محصول درست نیست',
            'price.integer'         => 'مقدار وارد شده برای قیمت محصول درست نیست',
            'image.mimes'           => 'فرمت تصویر وارد شده اشتباه است',
            'image.max'             => 'حداکثر حجم آپلود تصویر ۲ مگابایت می باشد',
            'category.exists'       => 'چنین دسته بندی ای در سیستم تعریف نشده است',
            'category.required'     => 'انتخاب کردن دسته بندی الزامی است'
        ];
    }
}
