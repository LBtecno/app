<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function demo (){
        $datos = [
            'titulo' => 'DEMO',
            'negocio' => 'DEMO',
            'productos' => 'demo',
            'numero' => '5202761032734',
            'logo' => 'https://menusypedidos.net/wp-content/uploads/2024/08/logo-1.png',
            'banner' => ''
        ];
        return view('demo', $datos);
    }
}
