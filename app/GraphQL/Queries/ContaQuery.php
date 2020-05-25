<?php

namespace App\GraphQL\Queries;

use App\Http\Controllers\ContaController;

class ContaQuery
{
    public function verSaldo($root, $args){
        $controller = new ContaController();
        return $controller->verSaldo($args['numero_conta']);
    }
}
