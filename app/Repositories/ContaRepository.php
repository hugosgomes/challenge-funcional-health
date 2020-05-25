<?php

namespace App\Repositories;

use App\Models\Conta;
use Exception;

class ContaRepository
{
    public function sacar($conta, $valor)
    {
        $conta = Conta::where(['numero_conta' => $conta])->first();
        $conta->saldo = $conta->saldo - $valor;
        $conta->save();
        return $conta;
    }

    public function depositar($conta, $valor)
    {
        $conta = Conta::where(['numero_conta' => $conta])->first();
        $conta->saldo = $conta->saldo + $valor;
        $conta->save();
        return $conta;
    }

    public function verSaldo($conta)
    {
        $conta = Conta::where(['numero_conta' => $conta])->first();
        return $conta->saldo;
    }

    public function existsConta($conta)
    {
        $conta = Conta::where(['numero_conta' => $conta])->first();
        return $conta instanceof Conta;
    }
}
