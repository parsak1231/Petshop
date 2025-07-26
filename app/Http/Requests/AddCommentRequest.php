<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'content' => 'required|string',
            'rating'  => 'nullable|in:1,2,3,4,5',
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'وارد کردن شناسه محصول الزامی است',
            'product_id.exists' => 'محصولی با این شناسه وجود ندارد',
            'content.required' => 'وارد کردن محتوای کامنت الزامی است',
            'rating.in' => 'مقدار وارد شده برای امتیاز اشتباه است',
        ];
    }
}
