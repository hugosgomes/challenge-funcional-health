<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{secure_asset('images/favicon.ico')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{secure_asset('css/style.css')}}">
        <script src="https://kit.fontawesome.com/2e314a729a.js" crossorigin="anonymous"></script>
        <title>Challenge Funcional Health Tech</title>
    </head>
    <body>
        <div class="container">
            <div class="first-content">
                <div class="logo line">
                    <img src="{{secure_asset('images/logo.png')}}" alt="">
                </div>
                <div class="line">
                    <div class="input-text">
                        <label for="">Número da Conta</label>
                        <input class="field-conta" type="number" placeholder="00000">
                        <span class="label-error">Conta não encontrada.</span>
                    </div>
                    <div class="search">
                        <button class="btn-round btn-search"><i class="fas fa-search"></i></button>
                        <div class="block-error"></div>
                    </div>
                </div>
                <div class="line">
                    <div class="input-text">
                        <label for="">Saldo</label>
                        <input class="text-saldo" type="text" readonly>
                    </div>
                    <button class="btn-primary btn-depositar">Depositar</button>
                    <button class="btn-primary btn-sacar">Sacar</button>
                </div>
            </div>
            <div class="second-content">
                <div class="logo line">
                    <img src="{{secure_asset('images/logo.png')}}" alt="">
                </div>
                <div class="line">
                    <div class="input-text money">
                        <label for="">Informe  a quantia a depositar</label>
                        <input class="text-amount" type="text">
                        <span class="label-error">Valor inválido!.</span>
                    </div>
                </div>
                <div class="line">
                    <button class="btn-primary btn-confirm">Confirmar</button>
                </div>
            </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.5.0.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
            crossorigin="anonymous">
        </script>
        <script src="{{secure_asset('js/script.js')}}"></script>
    </body>
</html>
