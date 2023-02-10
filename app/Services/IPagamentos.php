<?php

namespace App\Services;

interface IPagamentos
{

    public function pagamentoCartao($payload) : ResponsePagamento;
    public function pagamentoBoleto($payload) : ResponsePagamento;

}
