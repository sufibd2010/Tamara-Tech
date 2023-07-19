<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // Here we are validating the request data that we will receive from the client.
        return [
            'nickname' => ['required', 'string', 'max:255'],
            'personal_info' => ['required', 'string'],
            'user_id' => ['required', 'integer', ],
     
        ];
    }
}
