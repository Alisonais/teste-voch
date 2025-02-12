<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UnitsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'erros' => $validator->errors(),
        ],422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'trade_name' => 'required|string|max:255',
            'corporate_name' => 'required|string|max:255',
            'cnpj' => 'required|regex:/^\d{14}$/',
        ];
    }

    public function messages(): array
    {
        return [
            'trade_name.required' => 'O campo nome fantasia é obrigatório',
            'trade_name.string' => 'O campo nome fantasia deve ser uma string',
            'trade_name.max' => 'O campo nome fantasia deve ter no máximo 255 caracteres',

            'corporate_name.required' => 'O campo razão social é obrigatório',
            'corporate_name.string' => 'O campo razão social deve ser uma string',
            'corporate_name.max' => 'O campo razão social deve ter no máximo 255 caracteres',

            'cnpj.required' => 'O campo cnpj é obrigatório',
            'cnpj.regex' => 'O campo cnpj deve ter 14 caracteres',
        ];
    }
}
