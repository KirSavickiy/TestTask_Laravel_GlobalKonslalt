<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

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
        $rules = [
            'name' => 'required|string|min:10|max:255',
            'article' => 'required|string|min:1|max:255|regex:/^[A-Za-z0-9]+$/|unique:products,article',
            'status' => 'required:required|string',
        ];
        $rules = array_merge($rules, $this->validateAttribute());
        return $rules;
    }

    private function validateAttribute(): array
    {
        $rules = [];
        $attributes = $this->input('attributes', []);

        foreach ($attributes as $index => $attribute) {
            $rules["attributes.$index.key"] = 'required|string';
            $rules["attributes.$index.value"] = 'required|string';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name' => 'Имя продукта должно иметь минимум 10 символов!',
            'article.regex' => 'Поле "Артикул" может содержать только латинские символы и цифры.',
            'article.unique' => 'Это поле уже занято. Пожалуйста, выберите другое.',
            'status.required' => 'Выберете статус продукта!',
            'attributes.*.required' => 'Необходимо заполнить все поля.',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors()->toArray();
        $filteredErrors = [];
        $attributesErrors = [];

        foreach ($errors as $field => $messages) {
            // Проверяем, содержит ли поле `attributes.*.key` или `attributes.*.value`
            if (preg_match('/^attributes\.(\d+)\.(key|value)$/', $field, $matches)) {
                // Получаем индекс атрибута из регулярного выражения
                $index = $matches[1];

                // Группируем ошибки по индексу атрибута
                if (!isset($attributesErrors[$index])) {
                    $attributesErrors[$index] = [];
                }

                // Добавляем ошибку в соответствующую группу
                $attributesErrors[$index][] = $messages[0];
            } else {
                // Для других полей оставляем ошибки как есть
                $filteredErrors[$field] = $messages;
            }
        }

        // Для каждого атрибута добавляем единую ошибку (например, "Необходимо заполнить все поля.")
        foreach ($attributesErrors as $index => $messages) {
            $filteredErrors["attributes.$index"] = ['Необходимо заполнить все поля.'];
        }

        // Отправляем ответ с ошибками
        throw new HttpResponseException(
            response()->json(['errors' => $filteredErrors], 422)
        );
    }
}
