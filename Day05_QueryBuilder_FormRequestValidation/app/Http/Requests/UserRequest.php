<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UserRequest extends FormRequest
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
            'username' => 'required',
            'useremail' => 'required|email',
            'userage' => 'required|numeric',
            'usercity' => 'required',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         "username.required" => 'User Name is required',
    //         "useremail.required" => 'User Email is required',
    //         "userage.required" => 'User Age is required',
    //         "usercity.required" => 'User City is required',
    //     ];
    // }

    public function attributes()
    {
        return [
            "username" => 'User Name',
            "useremail" => 'User Email',
            "userage" => 'User Age',
            "usercity" => 'User City',
        ];
    }

    // protected function prepareForValidation(): void
    // {
    //     $this->merge([
    //         // 'username' => strtoupper($this->username),
    //         'username' => Str::slug($this->username),
    //     ]);
    // }

    // protected $stopOnFirstFailure = true;
}
