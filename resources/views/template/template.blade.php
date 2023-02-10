<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfect Pay</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>
<body class="antialiased">

@if($errors->any())
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger">
                    <ul>
                        @if($errors->all())
                            @foreach($errors->all() as $error)
                                <li class="{{ (\Request::route()->getName() == 'campanha.lojista') ? 'active' : '' }}">{!! $error !!} </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif


@if(Session::has('success'))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success">{!! Session::get('success') !!}</div>
            </div>
        </div>
    </div>
@endif


@if(Session::has('danger'))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger">{!! Session::get('danger') !!}</div>
            </div>
        </div>
    </div>
@endif

@if(Session::has('info'))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info">{!! Session::get('info') !!}</div>
            </div>
        </div>
    </div>
@endif

@yield('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
