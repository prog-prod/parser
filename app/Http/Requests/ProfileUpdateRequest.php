<?php

namespace App\Http\Requests;

use App\Rules\EmailValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['unique:users,email,'. auth()->id() . ',id', 'required', new EmailValidationRule()],
            'send_telegram' => ['nullable', 'bool'],
            'send_email' => ['nullable', 'bool'],
        ];
    }
}
