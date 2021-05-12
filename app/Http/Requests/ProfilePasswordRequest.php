<?php

namespace App\Http\Requests;

use App\Rules\CheckCurrentPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfilePasswordRequest extends FormRequest
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
            'current_password' => ['required', new CheckCurrentPasswordRule(auth()->id())],
            'password' => ['required', 'confirmed', 'min:6']
        ];
    }
}
