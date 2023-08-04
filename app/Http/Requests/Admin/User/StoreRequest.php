<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'roles'=>'required|integer',

        ];

    }

    public function messages()
    {
        return [
          'name.required'=>'Это поле необходимо быть заполненым',
          'name.string'=>'Должны быть только строковым формате',
          'email.required'=>'Это поле необходимо быть заполненым',
          'email.email'=>'Это поле необходимо быть email формате',
          'email.unique'=>'Пользователь с таким email уже существует',
        ];
    }
}
