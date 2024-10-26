<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category' => 'required|string',
            'amount' => 'nullable|numeric',
            'description' => 'nullable|string',
        ];
    }
}
