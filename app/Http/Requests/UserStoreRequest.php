<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:100', 'unique:users,email'], 
            'phone'     => ['required', 'string', 'min:10', 'max:15', 'regex:/^[0-9]+$/'], 
            'nid_no'    => ['required', 'integer', 'max:20', 'regex:/^[0-9]+$/'],
            'vaccin_date' => ['required', 'date', 'after_or_equal:today'],
            'vaccin_center_id' => ['required', 'integer', 'exists:vaccin_centers,id'],
        ];
    }

    public function messages()
    {
        return[
            'vaccin_center_id.required' => 'Vaccin center is required'
        ];
    }
}
