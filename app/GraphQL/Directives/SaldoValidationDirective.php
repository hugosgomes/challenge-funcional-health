<?php

namespace App\GraphQL\Directives;

use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class SaldoValidationDirective extends ValidationDirective
{
    public function rules(): array
    {
        return [
            'numero_conta' => 'exists:contas,numero_conta'
        ];
    }

    public function messages(): array
    {
        return
        [
            'numero_conta.exists' => 'Conta não existente'
        ];
    }
}
