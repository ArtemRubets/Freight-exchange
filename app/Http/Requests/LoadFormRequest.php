<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoadFormRequest extends FormRequest
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
            'load_name' => ['required', 'alpha', 'min:2', 'max:30'],
            'from' => ['required', 'alpha_dash', 'min:2', 'max:30'],
            'to' => ['required', 'alpha_dash', 'min:2', 'max:30'],
            'date_picker' => ['required', 'date', 'date_format:Y-m-d', 'after_or_equal:today'],
            'weight' => ['required', 'between:1,500', 'numeric'],
        ];
    }

    public function attributes()
    {
        return [
            'load_name' => 'Назва',
            'from' => 'Звідки',
            'to' => 'Куди',
            'date_picker' => 'Дата',
            'weight' => 'Вага'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute є обов\'язковим',
            'alpha' => 'Поле :attribute повинно включати лише літери',
            'alpha_dash' => 'Поле :attribute повинно включати лише літеро-числові символи, а також дефіси і символи нижнього підкреслення',
            'min' => 'Поле :attribute повинно бути не менше ніж :min символи',
            'max' => 'Поле :attribute повинно бути не більше ніж :max символів',
            'date' => 'Поле :attribute повинно бути корректним',
            'date_format' => 'Поле :attribute повинно бути формату :format',
            'after_or_equal' => 'Значення поля :attribute повинно бути від сьогоднішнього дня',
            'between' => 'Значення поля :attribute повинно бути в діапазоні від :min до :max',
            'numeric' => 'Поле :attribute повинно бути числовим'
        ];
    }
}
