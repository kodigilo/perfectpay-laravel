<?php

namespace App\Services;

use \MercadoPago;

class MercadoPagoPagamento implements IPagamentos
{

    public $public_key; // MERCADO_PAGO_PUBLIC_KEY
    public $token; //MERCADO_PAGO_ACCESS_TOKEN

    public function __construct()
    {
        $this->public_key = env('MERCADO_PAGO_PUBLIC_KEY');
        $this->token = env('MERCADO_PAGO_ACCESS_TOKEN');
        MercadoPago\SDK::setAccessToken($this->token);
    }


    public function pagamentoCartao($payload): ResponsePagamento
    {
        try {

            $payment = new MercadoPago\Payment();
            $payment->transaction_amount = (float)$payload['transactionAmount'];
            $payment->token = $payload['token'];
            $payment->description = $payload['description'];
            $payment->installments = (int)$payload['installments'];
            $payment->payment_method_id = $payload['paymentMethodId'];
            $payment->issuer_id = (int)$payload['issuer'];
            $payer = new MercadoPago\Payer();
            $payer->email = $payload['email'];
            $payer->identification = array(
                "type" => $payload['identificationType'],
                "number" => $payload['identificationNumber']
            );
            $payment->payer = $payer;
            $payment->save();

            $atributes = (object)$payment->getAttributes();

            if (is_object($atributes->error) && $atributes->error->status == 400) {
                throw new \Exception($atributes->error->message);
            }
            return new ResponsePagamento(true, 'Pagamento realizado com sucesso', $atributes);
        } catch (\Exception $e) {
            return new ResponsePagamento(false, $e->getMessage(), null);
        }
    }

    public function pagamentoBoleto($payload): ResponsePagamento
    {
        try {


            $nome = explode(' ', $payload['cadastro_nome'], 2);
            $sobrenome = array_pop($nome);
            $nome = $nome[0];
            $payment = new MercadoPago\Payment();
            $payment->transaction_amount = (float)$payload['transactionAmount'];
            $payment->description = $payload['description'];
            $payment->payment_method_id = "bolbradesco";
            $payment->payer = array(
                "email" => $payload['email'],
                "first_name" => $nome,
                "last_name" => $sobrenome,
                "identification" => array(
                    "type" => $payload['identificationType'],
                    "number" => $payload['identificationNumber']
                ),
                "address" => array(
                    "zip_code" => $payload["zip_code"],
                    "street_name" => $payload["street_name"],
                    "street_number" => $payload["street_number"],
                    "neighborhood" => $payload["neighborhood"],
                    "city" => $payload["city"],
                    "federal_unit" => $payload["federal_unit"],
                )
            );

            $payment->save();
            $atributes = (object)$payment->getAttributes();
            if (is_object($atributes->error) && $atributes->error->status == 400) {
                throw new \Exception($atributes->error->message);
            }
            return new ResponsePagamento(true, 'Pagamento realizado com sucesso', $atributes);
        } catch (\Exception $e) {
            dd($e);
            return new ResponsePagamento(false, $e->getMessage(), null);
        }
    }
}
