<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            'parent' => 'nullable|integer',
            'child' => 'nullable|integer',
            'city' => 'nullable|string|max:255',
            'pool' => 'nullable|boolean',
            'status' => 'nullable|string|max:255',
        ];
    }
}
