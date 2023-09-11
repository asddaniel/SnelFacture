<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
        return [
            'name'=> ['required', 'string', 'max:200'],
            'clientcategorie_id'=> ['required', 'integer'],
            'address'=> ['required','string','max:200'],
            'phone'=> ['string','max:200'],
            'uid'=> ['required','string','max:200'],

        ];
    }
}
