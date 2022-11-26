<?php

namespace App\Http\Requests\Holder;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHolderRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required', 'string']
        ];
    }
}
