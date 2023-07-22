<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'comment-update' => ['required'],
            'password-update' => ['required', 'min:4'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'comment-update.required' => __('Please Input :resource', ['resource' => __('validation.attributes.comment')]),
            'password-update.required' => __('Please Input :resource', ['resource' => __('validation.attributes.password')]),
            'password-update.min' => __('Please enter a :resource of at least :length characters', ['resource' => __('Password'), 'length' => '4']),
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $firstErrorMessage = $validator->errors()->first();

        $response = redirect()->back()
            ->withInput($this->input())
            ->with([
                'error-message' => $firstErrorMessage
            ])
            ->withErrors($validator->errors(), $this->errorBag);

        throw new HttpResponseException($response);
    }
}
