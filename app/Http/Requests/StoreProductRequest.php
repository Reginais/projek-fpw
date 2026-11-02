<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Praktikum Pertemuan 7
        return auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Praktikum Pertemuan 7
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|string|max:20|unique:products,code',
            'name' => 'required|string|max:150',
            'unit' => 'required|string|max:20',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            // Praktikum Pertemuan 7
            'code.unique' => 'Kode produk sudah digunakan, gunakan kode lain.',
        ]; 
    }
}