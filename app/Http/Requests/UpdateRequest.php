<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateRequest extends FormRequest
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
       $user = auth()->user();
        return [
            'nama' => 'required',
            'jenis_kelamin'  => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'jenis_kelamin.required' => 'jenis kelamin sudah isi.',
            'tanggal_lahir.required' => 'Tanggal harus diisi',
            'alamat.required' => 'alamat harus diisi ',
            'telepon.required' => 'telepon harus diisi',
            'agama.required' => 'agama harus diisi',
            'kelas.required' => 'kelas harus diisi',
            'jurusan.required' => 'jurusan harus diisi',
        ];
    }
}
