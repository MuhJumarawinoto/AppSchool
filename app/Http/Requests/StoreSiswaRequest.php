<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
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
            'jenis_kelamin'  => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|unique:users',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.unique' => 'Email sudah digunakan.',
            'jenis_kelamin.required' => 'Email sudah digunakan.',
            'tanggal_lahir.required' => 'Tanggal harus diisi',
            'alamat.required' => 'alamat harus diisi ',
            'telepon.required' => 'telepon harus diisi',
            'agama.required' => 'agama harus diisi',
            'kelas.required' => 'kelas harus diisi',
            'jurusan.required' => 'jurusan harus diisi',

        ];
    }

    
}
