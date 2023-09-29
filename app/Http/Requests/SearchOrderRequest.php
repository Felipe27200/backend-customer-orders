<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchOrderRequest extends FormRequest
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
            "document_type" => "numeric|required|digits_between:1,3",
            "document" => "numeric|required",
            "order_code" => "numeric|nullable",
        ];
    }
}
