<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * UpdateTicketRequest
 *
 * Form Request untuk validasi update tiket.
 */
class UpdateTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // TODO: add proper authorization later
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => $this->title ? trim($this->title) : null,
            'description' => $this->description ? trim($this->description) : null,
        ]);
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'description' => ['required', 'string', 'min:20'],
            'priority' => ['required', 'in:low,medium,high'],
            'status' => ['required', 'in:open,pending,resolved,closed'],
            'category' => ['nullable', 'string', 'max:100'],
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul tiket wajib diisi.',
            'title.min' => 'Judul minimal :min karakter.',
            'description.required' => 'Deskripsi tiket wajib diisi.',
            'description.min' => 'Deskripsi minimal :min karakter.',
            'priority.required' => 'Silakan pilih prioritas tiket.',
            'priority.in' => 'Prioritas tidak valid.',
            'status.required' => 'Status tiket wajib diisi.',
            'status.in' => 'Status tidak valid.',
        ];
    }

    /**
     * Attribute names.
     */
    public function attributes(): array
    {
        return [
            'title' => 'judul tiket',
            'description' => 'deskripsi',
            'priority' => 'prioritas',
            'status' => 'status',
            'category' => 'kategori',
        ];
    }
}
