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
                        <div class="">




                                <h3>Produto</h3>
                                <h1>Livro: Pensamento Livre</h1>
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset('images/livro.png')  }}">

                                    </div>
                                    <div class="col-8">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque malesuada libero id enim tristique, in laoreet turpis eleifend. Aenean ut felis vel nisl suscipit viverra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus gravida ut orci sit amet mollis. Nullam ullamcorper, metus eu sagittis tempor, tellus risus rhoncus nunc, eu pellentesque massa diam ut orci. Fusce tincidunt ac lorem nec feugiat. Pellentesque finibus tincidunt pulvinar.
                                            Nunc quis condimentum lorem. In venenatis nulla ut ipsum lacinia blandit. Mauris at velit ut turpis venenatis feugiat. Maecenas laoreet ullamcorper odio sed placerat.</p>
                                        <p>Quisque sagittis venenatis sapien sit amet mattis. Suspendisse potenti. Ut luctus dignissim turpis, id pellentesque elit blandit hendrerit. Etiam fringilla tortor ex, ut finibus leo mattis sit amet. Nam pulvinar porttitor aliquam. Vivamus molestie ligula non lorem gravida, sit amet placerat nibh semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit efficitur consectetur. Ut ut sapien eget nunc suscipit sagittis. Proin luctus neque
                                            vitae metus vehicula, in euismod tellus tempus. Vivamus ut libero metus. Sed facilisis dapibus lacus at consequat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam eu nisi neque.</p>
                                        <h2><em style="font: 20px;">por:</em> R$ 100,00</h2>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <a href="{{ route('cartao')  }}" class="btn btn-lg btn-success" id="form-checkout__submit">Pagar com cartão de crédito</a>
                                    <a href="{{ route('boleto')  }}" class="btn btn-lg btn-info" id="form-checkout__submit">Pagar com boleto</a>
                                </div>



                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
