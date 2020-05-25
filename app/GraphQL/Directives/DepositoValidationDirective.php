<?php

namespace App\GraphQL\Directives;

use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class DepositoValidationDirective extends ValidationDirective
{
    public function rules(): array
    {
        return [
            'numero_conta' => 'exists:contas,numero_conta',
            'valor' => 'gt:0'
        ];
    }

    public function messages(): array
    {
        return
        [
            'valor.gt' => 'Valor Inválido.',
            'numero_conta.exists' => 'Conta não existente'
        ];
    }
}
