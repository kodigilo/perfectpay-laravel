@extends('template.template')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h1>Perfect Pay</h1>
            </div>

            <div class="mt-8   bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class=" ">
                    <div class="p-6">
                        <div class="flex items-center">

                            <form id="form-checkout" action="{{ route('pagamento') }}" method="POST">
                                @csrf

                                <a style="float: right" href="{{ route('cartao')  }}" class="btn btn-lg btn-success" id="form-checkout__submit">Pagar com cartão de crédito</a>

                                <h3>Produto</h3>
                                <h1>Livro: Pensamento Livre</h1>
                                <h2><em style="font: 20px;">por:</em> R$ 100,00</h2>

                                <br>
                                <hr>
                                <br>
                                <button type="button" id="fake">preencher fake</button>
                                <h3>Seus dados</h3>
                                <p><em>Seu cadastro</em></p>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Nome completo <span class="obrigatorio">*</span></label>
                                            <input type="text" required name="cadastro_nome" value="{{ old('cadastro_nome') }}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <label class="form-label">E-mail <span class="obrigatorio">*</span></label>
                                            <input type="text" required name="cadastro_email" value="{{ old('cadastro_email') }}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Telefone <span class="obrigatorio">*</span></label>
                                            <input type="text" required name="cadastro_telefone" value="{{ old('cadastro_telefone') }}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <label class="form-label">CPF <span class="obrigatorio">*</span></label>
                                            <input type="text" required name="cadastro_cpf" value="{{ old('cadastro_cpf') }}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Senha <span class="obrigatorio">*</span></label>
                                            <input type="password" required name="cadastro_senha" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Confirmação de senha <span class="obrigatorio">*</span></label>
                                            <input type="password" name="senha_confirma" class="form-control"/>
                                        </div>
                                    </div>
                                </div>


                                <input id="method" name="method" value="boleto" type="hidden">

                                <br><br>
                                <h3>Dados do títular do boleto</h3>
                                <p>* Pessoa responsável pelo pagamento do boleto</p>


                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Documento do títular <span class="obrigatorio">*</span></label>
                                            <select class="form-checkout" id="form-checkout__identificationType" name="identificationType">
                                                <option value="" disabled selected>Tipo de documento</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Número do documento <span class="obrigatorio">*</span></label>
                                            <input type="number" class="form-checkout" id="form-checkout__identificationNumber" name="identificationNumber" placeholder="000.000.000-00"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Seu melhor e-mail <span class="obrigatorio">*</span></label>
                                            <input type="email" value="{{ old('email') }}" class="form-checkout" id="form-checkout__email" name="email" placeholder="joao@email.com"/>
                                        </div>
                                    </div>

                                    <br><br>
                                    <br><br>
                                    <br>

                                    <h3>Endereço</h3>
                                    <p><em>Para geração do boleto</em></p>

                                    <div class="col-2">
                                        <div class="input-group mb-3">
                                            <label class="form-label">CEP <span class="obrigatorio">*</span></label>
                                            <input type="text" value="{{ old('zip_code') }}"  required class="form-checkout" name="zip_code"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Endereço <span class="obrigatorio">*</span></label>
                                            <input type="text" value="{{ old('street_name') }}" required class="form-checkout" name="street_name"/>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Numero/Complemento <span class="obrigatorio">*</span></label>
                                            <input type="text" value="{{ old('street_number') }}" required class="form-checkout" name="street_number"/>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Bairro <span class="obrigatorio">*</span></label>
                                            <input type="text" value="{{ old('neighborhood') }}" required class="form-checkout" name="neighborhood"/>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Cidade <span class="obrigatorio">*</span></label>
                                            <input type="text" value="{{ old('city') }}" required class="form-checkout" name="city"/>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Estado <span class="obrigatorio">*</span></label>
                                            <select name="federal_unit" class="form-control" required>
                                                <option value="">Selecione</option>
                                                <option value="AC" {{ old('federal_unit') == 'AC' ? 'selected': '' }}>Acre</option>
                                                <option value="AL" {{ old('federal_unit') == 'AL' ? 'selected': '' }}>Alagoas</option>
                                                <option value="AP" {{ old('federal_unit') == 'AP' ? 'selected': '' }}>Amapá</option>
                                                <option value="AM" {{ old('federal_unit') == 'AM' ? 'selected': '' }}>Amazonas</option>
                                                <option value="BA" {{ old('federal_unit') == 'BA' ? 'selected': '' }}>Bahia</option>
                                                <option value="CE" {{ old('federal_unit') == 'CE' ? 'selected': '' }}>Ceará</option>
                                                <option value="DF" {{ old('federal_unit') == 'DF' ? 'selected': '' }}>Distrito Federal</option>
                                                <option value="ES" {{ old('federal_unit') == 'ES' ? 'selected': '' }}>Espírito Santo</option>
                                                <option value="GO" {{ old('federal_unit') == 'GO' ? 'selected': '' }}>Goiás</option>
                                                <option value="MA" {{ old('federal_unit') == 'MA' ? 'selected': '' }}>Maranhão</option>
                                                <option value="MT" {{ old('federal_unit') == 'MT' ? 'selected': '' }}>Mato Grosso</option>
                                                <option value="MS" {{ old('federal_unit') == 'MS' ? 'selected': '' }}>Mato Grosso do Sul</option>
                                                <option value="MG" {{ old('federal_unit') == 'MG' ? 'selected': '' }}>Minas Gerais</option>
                                                <option value="PA" {{ old('federal_unit') == 'PA' ? 'selected': '' }}>Pará</option>
                                                <option value="PB" {{ old('federal_unit') == 'PB' ? 'selected': '' }}>Paraíba</option>
                                                <option value="PR" {{ old('federal_unit') == 'PR' ? 'selected': '' }}>Paraná</option>
                                                <option value="PE" {{ old('federal_unit') == 'PE' ? 'selected': '' }}>Pernambuco</option>
                                                <option value="PI" {{ old('federal_unit') == 'PI' ? 'selected': '' }}>Piauí</option>
                                                <option value="RJ" {{ old('federal_unit') == 'RJ' ? 'selected': '' }}>Rio de Janeiro</option>
                                                <option value="RN" {{ old('federal_unit') == 'RN' ? 'selected': '' }}>Rio Grande do Norte</option>
                                                <option value="RS" {{ old('federal_unit') == 'RS' ? 'selected': '' }}>Rio Grande do Sul</option>
                                                <option value="RO" {{ old('federal_unit') == 'RO' ? 'selected': '' }}>Rondônia</option>
                                                <option value="RR" {{ old('federal_unit') == 'RR' ? 'selected': '' }}>Roraima</option>
                                                <option value="SC" {{ old('federal_unit') == 'SC' ? 'selected': '' }}>Santa Catarina</option>
                                                <option value="SP" {{ old('federal_unit') == 'SP' ? 'selected': '' }}>São Paulo</option>
                                                <option value="SE" {{ old('federal_unit') == 'SE' ? 'selected': '' }}>Sergipe</option>
                                                <option value="TO" {{ old('federal_unit') == 'TO' ? 'selected': '' }}>Tocantins</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <br>
                                <hr>
                                <br>
                                <input name="nome" value="--" type="hidden">
                                <input name="issuer" value="--" type="hidden">
                                <input name="paymentMethodId" value="--" type="hidden">
                                <input name="installments" value="--" type="hidden">
                                <input id="transactionAmount" name="transactionAmount" type="hidden" value="100">
                                <input id="description" name="description" type="hidden" value="Livro: Pensamento Livre">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-success" id="form-checkout__submit">Efetuar pagamento</button>
                                </div>

                            </form>


                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("{{ env('MERCADO_PAGO_PUBLIC_KEY') }}")
        const cardNumberElement = mp.fields.create('cardNumber', {
            placeholder: "Número do cartão"
        }).mount('form-checkout__cardNumber');
        (async function getIdentificationTypes() {
            try {
                const identificationTypes = await mp.getIdentificationTypes();
                const identificationTypeElement = document.getElementById('form-checkout__identificationType');

                createSelectOptions(identificationTypeElement, identificationTypes);
            } catch (e) {
                return console.error('Error getting identificationTypes: ', e);
            }
        })();

        function createSelectOptions(elem, options, labelsAndKeys = {label: "name", value: "id"}) {
            const {label, value} = labelsAndKeys;

            elem.options.length = 0;

            const tempOptions = document.createDocumentFragment();

            options.forEach(option => {
                const optValue = option[value];
                const optLabel = option[label];

                const opt = document.createElement('option');
                opt.value = optValue;
                opt.textContent = optLabel;

                tempOptions.appendChild(opt);
            });

            elem.appendChild(tempOptions);
        }

    </script>

    <script>
        jQuery(document).ready(function ($) {

            $('#fake').on('click', function () {
                $('input[name=cadastro_nome]').val('Luís Diogo Martins');
                $('input[name=cadastro_email]').val('luis_diogo_martins@julianacaran.com.br');
                $('input[name=identificationNumber]').val('28924553836');
                $('input[name=email]').val('luis_diogo_martins@julianacaran.com.br');
                $('input[name=cadastro_telefone]').val('(19) 98221-4461');
                $('input[name=cadastro_cpf]').val('289.245.538-36');
                $('input[name=cadastro_senha]').val('teste0102');
                $('input[name=senha_confirma]').val('teste0102');
                $('input[name=zip_code]').val('01001-000');
                $('input[name=street_name]').val('Praça da Sé');
                $('input[name=street_number]').val('1');
                $('input[name=neighborhood]').val('Sé');
                $('input[name=city]').val('São Paulo');
                $('select[name=federal_unit]').val('SP');
            });

        });
    </script>
@endsection
