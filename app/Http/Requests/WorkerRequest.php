<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'profession' => 'required|max:255',
            'experience' => 'required|max:255',
            'salary' => 'required|numeric|min:1000',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Данное поле обязательно к заполнению',
            'max' => 'Поле не может содержать больше чем :max символов',
            'numeric' => 'Данное поле должно содержать числовое значение',
            'min' => 'Значение данного поля должно быть не менее :min'
        ];
    }
}
