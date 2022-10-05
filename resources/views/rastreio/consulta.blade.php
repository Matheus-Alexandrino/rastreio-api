<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="descripton" content="Portal Nutrigenes" />
    <meta name="author" content="Nutrigenes" />
    <meta name="keywords" content="Nutrigenes, nutraceuticos" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Portal Nutrigenes') }}</title>
    <!-- App favicon -->
    <link rel="icon" href="" type="image/x-icon">
    <!-- Style Css-->
    <link href="{{ asset('css/app.css')}}" id="app-stylesheet" rel="stylesheet" type="text/css" />
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }

        .blue {
            background-color: #2979ff !important;
        }

        .gree {
            background-color: #00bb2d !important;
        }

        a:hover {
            text-decoration: none;
        }

        .text-light-gree {
            color: #00bb2d !important;
        }
    </style>
    <script>
        $(document).ready(function(){
                $('#checkbox').on('change', function(){
                    $('#password').attr('type',$('#checkbox').prop('checked')==true?"text":"password");
                });
            });
    </script>

</head>

<body class="light">

    <div id="app">
        <section class="tracking-redirect">
            <div class="tracking-redirect-container">
                @foreach ($objects as $object)
                <header data-v-372ecb4c="" class="header-redirect">
                    <div data-v-372ecb4c="" class="wrapper"><a data-v-372ecb4c="" href="/"
                            class="icon-logo router-link-active"><img data-v-372ecb4c="" src="/images/logo.png"
                                width="50%" alt="Rastreio"></a>
                        <div data-v-372ecb4c="" class="info-holder">
                            <p data-v-372ecb4c="">Código:</p>
                            <h1 data-v-372ecb4c="">{{$object['codObjeto']}}</h1>
                            {{-- <h2 data-v-372ecb4c="">ME220L5GT09BR</h2> --}}
                        </div>
                    </div>
                </header>
                {{-- Timeline --}}


                <div class="tracking-redirect-wrapper">
                    <h1>Informação do Rastreio</h1>
                    <div data-v-b28ba386="" class="progressive-container current-is-3">

                        @foreach ($object['eventos'] as $evento )
                        @endforeach
                        <div data-v-b28ba386="" class="wrapper step-0 success-step"><span data-v-b28ba386=""
                                class="icon-progress">
                            </span>
                            <div data-v-b28ba386="" class="content">

                                <h5 data-v-b28ba386="">Postado</h5>
                                <span data-v-b28ba386=""><br>
                                </span>
                            </div>
                            <div data-v-b28ba386="" class="line"></div>
                        </div>
                        <div data-v-b28ba386="" class="wrapper step-1 success-step"><span data-v-b28ba386=""
                                class="icon-progress"></span>
                            <div data-v-b28ba386="" class="content">


                                <h5 data-v-b28ba386="">Encaminhado</h5>
                                <span data-v-b28ba386="">
                                   {{date ('d/m/Y - h:i', strtotime( $evento['dtHrCriado']))}}
                                </span>
                            </div>
                            <div data-v-b28ba386="" class="line"></div>
                        </div>
                        <div data-v-b28ba386="" class="wrapper step-2 success-step"><span data-v-b28ba386=""
                                class="icon-progress"></span>
                            <div data-v-b28ba386="" class="content">
                                <h5 data-v-b28ba386="">Saiu para a entrega</h5>
                                <span data-v-b28ba386="">
                                    {{date ('d/m/Y - h:i', strtotime( $evento['dtHrCriado']))}}</span>
                                </span>
                            </div>
                            <div data-v-b28ba386="" class="line"></div>
                        </div>
                        <div data-v-b28ba386="" class="wrapper step-3 success-step current-step"><span
                                data-v-b28ba386="" class="icon-progress"></span>
                            <div data-v-b28ba386="" class="content">
                                <h5 data-v-b28ba386="">Entregue</h5>
                                <span data-v-b28ba386="">
                                  {{date ('d/m/Y - h:i', strtotime( $evento['dtHrCriado']))}}</span>
                                </span>
                            </div>
                        </div>

                    </div>
                    {{-- Timeline End --}}

                    {{-- Seção Vertical --}}

                    <section data-v-312ece04="" class="table-information">
                        <header data-v-312ece04="">
                            <h3 data-v-312ece04="">Status</h3>
                            <h3 data-v-312ece04="">Movimentação</h3>
                        </header>

                        <ul data-v-312ece04="" class="body">

                            @foreach ($object['eventos'] as $evento)
                            <li data-v-312ece04="">
                                <div data-v-312ece04="" class="wrapper">

                                    <img data-v-312ece04=""
                                        src="https://proxyapp.correios.com.br{{$evento['urlIcone']}}"

                                        class="icon-status">
                                    <div data-v-312ece04="" class="content">
                                        <h5 data-v-312ece04=""> {{$evento['descricao']}} </h5>
                                        <p data-v-312ece04="">  {{date ('d/m/Y - h:i', strtotime( $evento['dtHrCriado']))}}</p>
                                    </div>
                                </div>
                                <div data-v-312ece04="" class="wrapper">

                                    <p data-v-312ece04="">{{$evento['unidade']['tipo']}} - {{$evento['unidade']['endereco']['cidade']}} {{$evento['unidade']['endereco']['uf']}}</p>

                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </section>

                </div>
                {{-- Seção Vertical End --}}

                @endforeach
            </div>
            <div style="display: none;">
                <div class="spinner-container" style="display: none;">
                    <div id="spinner" class="active"><span id="first" class="ball -yellow"></span> <span id="second"
                            class="ball"></span> <span id="third" class="ball"></span> <span id="fourth"
                            class="ball"></span></div>
                </div>
            </div>
        </section>
    </div>

</body>
<script>
    (function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)
</script>






<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
    </html>
