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

                                <a style="float: right" href="{{ route('boleto')  }}" class="btn btn-lg btn-info" id="form-checkout__submit">Pagar com boleto</a>

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

                                <br>
                                <hr>
                                <br>
                                <h3>Dados do cartão</h3>
                                <p><em>* exatamente como está no cartão</em></p>
                                <p>Para teste: <strong>Mastercard</strong> | <em>5031 4332 1540 6351</em> | 123 |	11/25</p>
                                <div class="input-group mb-3">
                                    <label class="form-label">Nome do títular do cartão <span class="obrigatorio">*</span></label>
                                    <input type="text" name="nome" class="form-checkout form-control" id="form-checkout__cardholderName" placeholder="Titular do cartão"/>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="form-label">Número do cartão <span class="obrigatorio">*</span></label>
                                    <div class="form-checkout" id="form-checkout__cardNumber"></div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Vencimento do cartão <span class="obrigatorio">*</span></label>
                                            <div class="form-checkout" id="form-checkout__expirationDate"></div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Código do cartão <span class="obrigatorio">*</span></label>
                                            <div class="form-checkout" id="form-checkout__securityCode"></div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Banco <span class="obrigatorio">*</span></label>
                                            <select class="form-checkout" id="form-checkout__issuer" name="issuer">
                                                <option value="" disabled selected>Banco emissor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group mb-3">
                                            <label class="form-label">Parcelamento <span class="obrigatorio">*</span></label>
                                            <select class="form-checkout" id="form-checkout__installments" name="installments">
                                                <option value="" disabled selected>Parcelas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br><br>
                                <h3>Dados do títular do cartão</h3>
                                <p>* Pessoa responsável do cartão</p>




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
                                </div>


                                <input id="token" name="token" type="hidden">
                                <input value="--" name="zip_code" type="hidden">
                                <input value="--" name="street_name" type="hidden">
                                <input value="--" name="street_number" type="hidden">
                                <input value="--" name="neighborhood" type="hidden">
                                <input value="--" name="city" type="hidden">
                                <input value="--" name="federal_unit" type="hidden">
                                <input id="method" name="method" value="credito" type="hidden">
                                <input id="paymentMethodId" name="paymentMethodId" type="hidden">
                                <input id="transactionAmount" name="transactionAmount" type="hidden" value="100">
                                <input id="description" name="description" type="hidden" value="Livro: Pensamento Livre">
                                <br>
                                <hr>
                                <br>
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
        const expirationDateElement = mp.fields.create('expirationDate', {
            placeholder: "MM/YY",
        }).mount('form-checkout__expirationDate');
        const securityCodeElement = mp.fields.create('securityCode', {
            placeholder: "Código de segurança"
        }).mount('form-checkout__securityCode');


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


        const paymentMethodElement = document.getElementById('paymentMethodId');
        const issuerElement = document.getElementById('form-checkout__issuer');
        const installmentsElement = document.getElementById('form-checkout__installments');

        const issuerPlaceholder = "Banco emissor";
        const installmentsPlaceholder = "Parcelas";

        let currentBin;
        cardNumberElement.on('binChange', async (data) => {
            const {bin} = data;
            try {
                if (!bin && paymentMethodElement.value) {
                    clearSelectsAndSetPlaceholders();
                    paymentMethodElement.value = "";
                }

                if (bin && bin !== currentBin) {
                    const {results} = await mp.getPaymentMethods({bin});
                    const paymentMethod = results[0];

                    paymentMethodElement.value = paymentMethod.id;
                    updatePCIFieldsSettings(paymentMethod);
                    updateIssuer(paymentMethod, bin);
                    updateInstallments(paymentMethod, bin);
                }

                currentBin = bin;
            } catch (e) {
                console.error('error getting payment methods: ', e)
            }
        });

        function clearSelectsAndSetPlaceholders() {
            clearHTMLSelectChildrenFrom(issuerElement);
            createSelectElementPlaceholder(issuerElement, issuerPlaceholder);

            clearHTMLSelectChildrenFrom(installmentsElement);
            createSelectElementPlaceholder(installmentsElement, installmentsPlaceholder);
        }

        function clearHTMLSelectChildrenFrom(element) {
            const currOptions = [...element.children];
            currOptions.forEach(child => child.remove());
        }

        function createSelectElementPlaceholder(element, placeholder) {
            const optionElement = document.createElement('option');
            optionElement.textContent = placeholder;
            optionElement.setAttribute('selected', "");
            optionElement.setAttribute('disabled', "");

            element.appendChild(optionElement);
        }

        // Esta etapa melhora as validações cardNumber e securityCode
        function updatePCIFieldsSettings(paymentMethod) {
            const {settings} = paymentMethod;

            const cardNumberSettings = settings[0].card_number;
            cardNumberElement.update({
                settings: cardNumberSettings
            });

            const securityCodeSettings = settings[0].security_code;
            securityCodeElement.update({
                settings: securityCodeSettings
            });
        }


        async function updateIssuer(paymentMethod, bin) {
            const {additional_info_needed, issuer} = paymentMethod;
            let issuerOptions = [issuer];

            if (additional_info_needed.includes('issuer_id')) {
                issuerOptions = await getIssuers(paymentMethod, bin);
            }

            createSelectOptions(issuerElement, issuerOptions);
        }

        async function getIssuers(paymentMethod, bin) {
            try {
                const {id: paymentMethodId} = paymentMethod;
                return await mp.getIssuers({paymentMethodId, bin});
            } catch (e) {
                console.error('error getting issuers: ', e)
            }
        };


        async function updateInstallments(paymentMethod, bin) {
            try {
                const installments = await mp.getInstallments({
                    amount: document.getElementById('transactionAmount').value,
                    bin,
                    paymentTypeId: 'credit_card'
                });
                const installmentOptions = installments[0].payer_costs;
                const installmentOptionsKeys = {label: 'recommended_message', value: 'installments'};
                createSelectOptions(installmentsElement, installmentOptions, installmentOptionsKeys);
            } catch (error) {
                console.error('error getting installments: ', e)
            }
        }


        const formElement = document.getElementById('form-checkout');
        formElement.addEventListener('submit', createCardToken);

        async function createCardToken(event) {
            try {
                const tokenElement = document.getElementById('token');
                if (!tokenElement.value) {
                    event.preventDefault();
                    const token = await mp.fields.createCardToken({
                        cardholderName: document.getElementById('form-checkout__cardholderName').value,
                        identificationType: document.getElementById('form-checkout__identificationType').value,
                        identificationNumber: document.getElementById('form-checkout__identificationNumber').value,
                    });
                    tokenElement.value = token.id;
                    formElement.requestSubmit();
                }
            } catch (e) {
                console.error('error creating card token: ', e)
            }
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
            });

        });
    </script>
@endsection
