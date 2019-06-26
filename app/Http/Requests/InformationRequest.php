<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
            'name' => 'required|min:2|max:150|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'msg' => 'required|max:1000'
        ];
    }

     public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'telephone.required' => 'El Telefono es requerido',
            'msg.required' => 'El mensaje es requerido',
            'name.regex' => 'Nombre no debe contener caracteres especiales',
        ];
    }
}
