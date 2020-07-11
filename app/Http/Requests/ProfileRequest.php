<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
        $rules = [
            'title' => 'required|min:1|max:75',
            'profession' => 'required|max:75',
            'first_name'  => 'required|min:3|max:50',
            'last_name'  => 'required|min:3|max:50',
            'marital_status' =>'required',
            'child_number' =>'required',
            // 'email' => 'required|string|email|max:255|unique:users,email'.$user->id,
            'promotion' => 'required',
            'filiere' => 'required',
            'gender' =>'in:Femme,Homme,Autres',
            'birthday'  => 'required|date',
            'notes'  => 'max:200',
            'sport'  => 'max:50',
            'extra'  => 'max:30',
            'hobbies'  => 'max:50',
            'inputExperience' => 'required|max:75',
            'inputSkills' => "required|max:75",
            'calling_code' => 'required',
            'phone' => 'required',
            'city'  => 'max:50',
            'country'  => 'max:50',
            'checkbox' => 'required',
        ];

        $rules['email'] = [
            'required',
            'string',
            'unique:users,email',
            'max:255',
            'email',
            Rule::unique('users')->ignore($this->user()->id)
        ];

        return $rules;
    }
}
