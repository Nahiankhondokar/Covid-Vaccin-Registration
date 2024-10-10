<?php

namespace App\Http\Requests;

use App\Rules\SundayOrThursday;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

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
            'phone'     => ['required', 'string', 'min:10', 'max:15', 'regex:/^[0-9]+$/', 'unique:users,phone'], 
            'nid_no'    => ['required', 'integer', 'max:20', 'regex:/^[0-9]+$/', 'unique:users,nid_no'],
            'vaccin_date' => [
                'required',
                'date',
                'after_or_equal:today',
                new SundayOrThursday(),
            ],
            'vaccin_center_id' => ['required', 'integer', 'exists:vaccin_centers,id'],
        ];
    }

    public function messages(): array
    {
        return[
            'vaccin_center_id.required' => 'Vaccin center is required'
        ];
    }
}