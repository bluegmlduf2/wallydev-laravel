<?php

use Illuminate\Support\Facades\Log;
use DeepL\Translator;

function translate($text, $target)
{
    try {
        $authKey = config('app.translator_api_key');
        $translator = new Translator($authKey);
        $targetLanguage = $target === 'en'?'en-US':$target;

        $result = $translator->translateText($text, null, $targetLanguage);

        return $result->text;
    } catch (Throwable $e) {
        Log::warning($e->getMessage());

        return $text;
    }
}
