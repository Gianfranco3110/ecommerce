<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'rol' => 'required',
            'whatsapp' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.unique' => 'El :attribute ya esta en uso',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'last_name' => 'apellido',
            'rol' => 'rol',
            'whatsapp' => 'whatsapp',
            'email' => 'correo',
            'password' => 'contraseña',

        ];
    }
}
