<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
            'number' => ['required', 'string'],
            'account_type' => ['required', 'in:checking, saving'],
            'balance' => ['nullable', 'numeric'],
            'holder_id' => ['required', 'integer', 'exists:holders,id'],
            'agency_id' => ['required', 'integer', 'exists:agencies,id' ]
        ];
    }
}
