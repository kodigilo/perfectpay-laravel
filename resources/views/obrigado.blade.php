@extends('template.template')
@section('content')
    <div class="relative   bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-12 lg:px-12">
            <div class=" ">
                <h1>Perfect Pay</h1>
            </div>
            <div class="mt-8   bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class=" ">
                    <div class="p-6">
                        <div class="">
                            <h1>Obrigado!</h1>
                            <p>{{ $pagamento->payload->cadastro_nome }}, seu pagamento foi realizado com sucesso!</p>
                            <h4>Dados do pagamento</h4>
                            @if($pagamento->payload->method == 'credito')
                                <h3>Crédito: {{ $pagamento->payload->paymentMethodId }}</h3>
                                <p>Parcelas: {{ $pagamento->payload->installments }}</p>
                            @else
                                <h3>Boleto</h3>
                                <a class="btn btn-success" target="_blank" href="{{ $pagamento->response->transaction_details->external_resource_url }}">Link para o boleto</a>
                                <iframe src="{{$pagamento->response->transaction_details->external_resource_url}}" style="width: 100%; height: 300px;" frameborder="0"></iframe>
                            @endif
                            <h4>Produto</h4>
                            <p>{{ $pagamento->payload->description }} <br>
                                R$ {{ number_format($pagamento->payload->transactionAmount, 2, ',', '.') }}
                            </p>
                            <p><strong>Obrigado!</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
