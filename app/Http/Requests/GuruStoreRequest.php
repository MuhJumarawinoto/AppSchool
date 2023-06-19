<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'wali_kelas' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ];
    }
}
