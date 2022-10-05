<?php

namespace App\Http\Controllers;

use App\Models\Correios;
use ArrayAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Psl\Ref;

class CorreiosController extends Controller
{
    const URL_BASE = 'https://proxyapp.correios.com.br';

    public function index()
    {
        return view('rastreio.home',);
    }
    public function consulta(Request $request)
    {
        // $codigo = 'NA351750430BR';
        $codigo = $request->codigo;
        // $urlApi= 'https://proxyapp.correios.com.br/v1/sro-rastro/';

        $objects = Http::get('https://proxyapp.correios.com.br/v1/sro-rastro/' . $codigo);
        $objects->json();
        $objects = $objects['objetos'] ;


        return view('rastreio.consulta', [
                'codigo' => $codigo,

        ])->with(   'objects', $objects);

    }

}

