<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class RecaptchaValidation implements Rule
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
        try {
            $client = new Client(['timeout' => 5]);
            // 클라이언트에서 보낸 토큰을 구글캡챠에 전송해서 검증한다
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => env('RECAPTCHA_SECRET_KEY'),
                    'response' => $value,
                ],
            ]);
            Log::warning($response->getBody()->getContents());

            $result = json_decode($response->getBody()->getContents(), true);
            Log::warning(json_encode($result, JSON_PRETTY_PRINT));

            // score가 1에 가까울수록 사람에 가깝다
            return isset($result['success']) && $result['success'] && $result['score'] > 0.5;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __(('ReCAPTCHA verification failed.'));
    }
}
