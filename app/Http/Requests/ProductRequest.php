<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        //São as validações de cada campo, são chamadas no ProductController.
        return [
            'name' => ['required', 'max:70'],
            'price' => ['required', 'numeric', 'min:1'],
            'quantity' => ['required', 'integer', 'min:1'],
            'description' => ['max:255'],
        ];
    }
}
