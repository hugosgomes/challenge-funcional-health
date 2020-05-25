<?php

namespace App\GraphQL\Mutations;

use App\Http\Controllers\ContaController;

class ContaMutator
{
    public function sacar($root, array $args){
        $controller = new ContaController();
        return $controller->sacar($args['numero_conta'], $args['valor']);
    }

    public function depositar($root, array $args){
        $controller = new ContaController();
        return $controller->depositar($args['numero_conta'], $args['valor']);
    }
}
