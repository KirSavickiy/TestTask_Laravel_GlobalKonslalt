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
        return [
            'name' => 'required|string|min:10|max:255',
            'article' => 'required|string|min:1|max:255|regex:/^[A-Za-z0-9]+$/|unique:products,article',
            'status' => 'required:required|string',
            'attributes' => 'array',
        ];
    }
    public function messages(): array
    {
        return [
            'article.regex' => 'Поле "Артикул" может содержать только латинские символы и цифры.',
            'article.unique' => 'Это поле уже занято. Пожалуйста, выберите другое.',
            'status.required' => 'Выберете статус продукта!'
        ];
    }
}
