<?php

namespace App\Http\Requests\Feedback;

use App\Http\Controllers\HelperTrait;
use Illuminate\Foundation\Http\FormRequest;

class CallbackRequest extends FormRequest
{
    use HelperTrait;

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
            'from' => 'in:page-first-form,page-second-form,phone-icon,get-a-service,consulting-button,consulting-button-1,consulting-button-2,about-company-button',
            'name' => $this->validationString,
            'phone' => $this->validationPhone
        ];
    }
}
