<?php

namespace App\Http\Controllers;

use App\Repositories\ContaRepository;

class ContaController extends Controller
{

    public function sacar($conta, $valor)
    {
        $repository = new ContaRepository();
        return $repository->sacar($conta, $valor);
    }

    public function depositar($conta, $valor)
    {
        $repository = new ContaRepository();
        return $repository->depositar($conta, $valor);
    }

    public function verSaldo($conta)
    {
        $repository = new ContaRepository();
        return $repository->verSaldo($conta);
    }

    public function existsConta($conta)
    {
        $repository = new ContaRepository();
        return $repository->existsConta($conta);
    }
}
