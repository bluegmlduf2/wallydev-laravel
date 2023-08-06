<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::authorize('is-admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        /**
         * upload_max_filesize = 20M // php.ini의 용량제한 20mb 으로 변경
         * post_max_size = 20M // php.init의 post용량제한 20mb로 변경
         * client_max_body_size 10M; // nginx의 용량제한 20mb으로 변경
         */
        return [
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10240'], // 10MB 용량제한
        ];
    }
}
