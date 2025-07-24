<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ConvertAllNumbersMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $data = $request->all();
        $converted = $this->convertAllValues($data);
        $request->merge($converted);
        return $next($request);
    }

    private function convertAllValues(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->convertAllValues($value);
            } elseif (is_string($value) || is_numeric($value)) {
                $data[$key] = $this->convertToEnglishNums($value);
            }
        }
        return $data;
    }

    private function convertToEnglishNums($input)
    {
        $persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabicDigits = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        if (preg_match('/[۰-۹]/u', $input)) {
            $input = str_replace($persianDigits, $englishDigits, $input);
        }

        if (preg_match('/[٠-٩]/u', $input)) {
            $input = str_replace($arabicDigits, $englishDigits, $input);
        }

        return $input;
    }
}
