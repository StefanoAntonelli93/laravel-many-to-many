<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            // posso usare anche array per le validazioni
            'name' => 'required|string|unique:projects|min:5|max:70',
            'description' => 'string|min:5|max:255',
            'status' => 'required|string|in:in corso,completato,in attesa,cancellato',
            'cover_image' => 'nullable|image|max:2048',
            // validazione campo type_id, deve esistere nella colonna id della tabella type
            'type_id' => ['nullable', 'exists:types,id'],
            // technologies può essere nullo e se esiste nella tabella technologies nel campo id allora è valido
            'technologies' => ['nullable', 'exists:technologies,id']
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'title.required' => 'Il nome è obbligatorio',
    //         'title.min' => 'Minimo 5 caratteri',
    //     ];
    // }
}
