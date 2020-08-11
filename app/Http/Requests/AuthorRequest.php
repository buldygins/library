<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name'=>'required|regex:/^[\pL\s\-]+$/u|min:4|max:30'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Введите имя!',
          'name.regex'=>'Имя должно состоять только из букв!',
          'name.min'=>'Слишком короткое имя!',
          'name.max'=>'Слишком длинное имя!',
        ];
    }
}
