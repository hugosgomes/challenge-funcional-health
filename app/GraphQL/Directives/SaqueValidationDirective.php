<?php

namespace App\GraphQL\Directives;

use App\Http\Controllers\ContaController;
use App\Models\Conta;
use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class SaqueValidationDirective extends ValidationDirective
{
    public function rules(): array
    {
        $controller = new ContaController;
        if (!$controller->existsConta($this->args['numero_conta']))
        {
            return [
                'numero_conta' => 'exists:contas,numero_conta'
            ];
        }

        $saldo = $controller->verSaldo($this->args['numero_conta']);

        return [
            'valor' => 'gt:0|lte:'.$saldo
        ];
    }

    public function messages(): array
    {
        return
        [
            'valor.lte' => 'Saldo insuficiente.',
            'valor.gt' => 'Valor Inválido.',
            'numero_conta.exists' => 'Conta não existente'
        ];
    }
}
