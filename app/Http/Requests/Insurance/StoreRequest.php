<?php

namespace App\Http\Requests\Insurance;

use App\Enum\InsuranceType;
use App\Enum\ConsumerContactPreference;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'array'],
            'type.*' => [Rule::in(InsuranceType::values())],
            'firstname' => ['required', 'string', 'min:3', 'max:255'],
            'lastname' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => [
                Rule::requiredIf($this->input('contact_preference') === \App\Enum\ConsumerContactPreference::Phone->value),
                'max:20'
            ],
            'contact_preference' => ['required', Rule::in(ConsumerContactPreference::values())],
            'street' => ['nullable', 'string', 'max:255'],
            'ste_apt' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', Rule::in(['0', '1'])],
            'zipcode' => ['required', 'string', 'max:10'],
        ];
    }
}
