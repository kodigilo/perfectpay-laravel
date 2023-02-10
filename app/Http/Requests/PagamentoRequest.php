<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagamentoRequest extends FormRequest
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
            'cadastro_nome' => 'required',
            'cadastro_email' => 'required',
            'cadastro_telefone' => 'required',
            'cadastro_cpf' => 'required',
            'cadastro_senha' => 'required',
            'senha_confirma' => 'required',
            'nome' => 'required',
            'issuer' => 'required',
            'installments' => 'required',
            'identificationType' => 'required',
            'identificationNumber' => 'required',
            'email' => 'required',
            'paymentMethodId' => 'required',
            'transactionAmount' => 'required',
            'description' => 'required',
            'zip_code' => 'required',
            'street_name' => 'required',
            'street_number' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'federal_unit' => 'required',
        ];
    }

    //mensagens de erro

    public function messages()
    {
        return [
            'cadastro_nome.required' => 'O campo nome é obrigatório',
            'cadastro_email.required' => 'O campo email é obrigatório',
            'cadastro_telefone.required' => 'O campo telefone é obrigatório',
            'cadastro_cpf.required' => 'O campo cpf é obrigatório',
            'cadastro_senha.required' => 'O campo senha é obrigatório',
            'senha_confirma.required' => 'O campo confirmação de senha é obrigatório',
            'nome.required' => 'O campo nome é obrigatório',
            'issuer.required' => 'O campo bandeira é obrigatório',
            'installments.required' => 'O campo parcelas é obrigatório',
            'identificationType.required' => 'O campo tipo de documento é obrigatório',
            'identificationNumber.required' => 'O campo número do documento é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'paymentMethodId.required' => 'O campo método de pagamento é obrigatório',
            'transactionAmount.required' => 'O campo valor é obrigatório',
            'description.required' => 'O campo descrição é obrigatório',
            'zip_code.required' => 'O campo cep é obrigatório',
            'street_name.required' => 'O campo rua é obrigatório',
            'street_number.required' => 'O campo número é obrigatório',
            'neighborhood.required' => 'O campo bairro é obrigatório',
            'city.required' => 'O campo cidade é obrigatório',
            'federal_unit.required' => 'O campo estado é obrigatório',
        ];
    }

}
