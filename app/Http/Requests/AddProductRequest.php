<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'price'         => 'required|integer|min:1000',
            'quantity'      => 'required|integer|min:1',
            'image'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category'      => 'required|exists:categories,id'
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
            'image.required'        => 'وارد کردن تصویر برای محصول الزامی است',
            'image.mimes'           => 'فرمت تصویر وارد شده اشتباه است',
            'image.max'             => 'حداکثر حجم آپلود تصویر ۲ مگابایت می باشد',
            'category.exists'       => 'چنین دسته بندی ای در سیستم تعریف نشده است',
            'category.required'     => 'انتخاب کردن دسته بندی الزامی است'
        ];
    }
}
