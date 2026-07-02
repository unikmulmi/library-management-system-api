<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBorrowingRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'book' => 'required|exists:book,id',
            'member_id' => 'required|exists:members,id', //exists:table,column
            'borrowed_date' => 'nullable|date',
            'due_date' => 'nullable|date|after:borrowed_date', // after:date
        ];
    }
}
