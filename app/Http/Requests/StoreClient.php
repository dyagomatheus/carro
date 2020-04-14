<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
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
            'email' => 'required|unique:users|max:255',
            'social_name' => 'required',
            'fantasy_name'  => 'required', 
            'cnpj'  => 'required', 
            'code'  => 'required', 
            'telephone'  => 'required|integer', 
            'zipcode'  => 'required', 
            'street'  => 'required', 
            'number'  => 'required|integer', 
            'district'  => 'required', 
            'city'  => 'required', 
            'state'  => 'required', 
            'state_registration'  => 'required', 
            'responsible'  => 'required|min:5'

        ];
    }

    public function messages()
    {
    return [
        'email.required' => 'O campo e-mail é obrigatório',
        'email.unique'  => 'Este email já foi cadastrado',
        'email.max'  => 'O email deve ter menos que 255 caracters',
        'number.required'  => 'O campo número é obrigatório',
        'social_name.required'  => 'O campo número é obrigatório',
        'fantasy_name.required'  => 'O campo número é obrigatório',
        'cnpj.required'  => 'O campo número é obrigatório',
        'code.required'  => 'O campo Usuário é obrigatório',
        'telephone.required'  => 'O campo número é obrigatório',
        'zipcode.required'  => 'O campo número é obrigatório',
        'street.required'  => 'O campo número é obrigatório',
        'district.required'  => 'O campo número é obrigatório',
        'city.required'  => 'O campo número é obrigatório',
        'state.required'  => 'O campo número é obrigatório',
        'state_registration.required'  => 'O campo número é obrigatório',
        'responsible.required'  => 'O campo Responsável é obrigatório',
        'responsible.min'  => 'O campo Responsável deve ser maior que 5 caracters',
        'number.integer'  => 'Informe apenas números para o campo Número',
        'telephone.integer'  => 'Informe apenas números para o campo Telefone',
    ];
}
}
