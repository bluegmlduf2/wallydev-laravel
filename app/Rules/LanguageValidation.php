<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LanguageValidation implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // 게시물 수정시 설정언어가 한글이고 번역모드로 저장시 에러 발생
        return $value && session('locale') !== 'ko';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __(('Translation saving is not possible when the language setting is in Korean.'));
    }
}
