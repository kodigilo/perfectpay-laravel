<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagamentoRequest;
use App\Models\PagamentoModel;
use App\Services\MercadoPagoPagamento;
use Illuminate\Support\Str;
class PagamentoController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function cartao()
    {
        return view('cartao');
    }

    public function boleto()
    {
        return view('boleto');
    }


    public function pagamento(PagamentoRequest $request)
    {
        $payload = $request->all();
        $pagamento = new MercadoPagoPagamento();
        $result = isset($payload['method']) && $payload['method'] == 'boleto' ? $pagamento->pagamentoBoleto($payload) : $pagamento->pagamentoCartao($payload);
        if ($result->getStatus() == false)
            return redirect()->back()->withInput()->with('error', $result->getMessage());
        $payloadDb = PagamentoModel::create(['payload' => json_encode($payload),'key_uuid'=>Str::uuid()]);
        $payloadDb->response = json_encode($result->getData());
        $payloadDb->save();
        return redirect()->route('obrigado', $payloadDb->key_uuid);
    }


    public function obrigado($id)
    {
        $pagamento = PagamentoModel::where('key_uuid',$id)->first();
        $pagamento->response = json_decode($pagamento->response);
        $pagamento->payload = json_decode($pagamento->payload);
        return view('obrigado', compact('pagamento'));
    }
}
