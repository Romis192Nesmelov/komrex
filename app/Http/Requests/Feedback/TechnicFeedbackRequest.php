<?php

namespace App\Http\Requests\Feedback;

use App\Http\Controllers\HelperTrait;
use Illuminate\Foundation\Http\FormRequest;

class TechnicFeedbackRequest extends FormRequest
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
            'id' => 'required|integer|exists:technics,id',
            'name' => $this->validationString,
            'phone' => $this->validationPhone,
            'comments' => $this->validationText,
            'i_agree' => 'accepted'
        ];
    }
}
