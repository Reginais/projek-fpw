<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Tugas Pertemuan 9 Soal No.1
        return auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            // Tugas Pertemuan 9 Soal No.1
            'name' => 'required|string|max:100|unique:categories,name,' . $this->category->id,
            'description' => 'nullable|string|max:255',
        ];
    }
}