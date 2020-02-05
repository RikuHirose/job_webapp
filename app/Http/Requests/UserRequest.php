<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'                => 'string|max:255',
            'email'               => 'string|email|max:255',
            'password'            => 'string|min:8|confirmed',
            'description'         => 'string',
            'birthday'            => 'date',
            'skills'              => 'array',
            'occupations'         => 'array',
            'office_time_request' => 'integer',
            'work_time_request'   => 'integer',
            'birth_year'          => 'required_with:birth_month,birth_day',
            'birth_month'         => 'required_with:birth_year,birth_day',
            'birth_day'           => 'required_with:birth_year,birth_month',
            // 'image' => 'file|mimes:jpeg,bmp,png|max:10000'
        ];
    }

    // 参考: https://qiita.com/snbk/items/7f0767dfb305a52d41fb
    public function getValidatorInstance()
    {
        if ($this->input('birth_day') && $this->input('birth_month') && $this->input('birth_year'))
        {
            $birthDate = implode('-', $this->only(['birth_year', 'birth_month', 'birth_day']));
            $this->merge([
                'birthday' => $birthDate,
            ]);
        }

        return parent::getValidatorInstance();
    }
}
