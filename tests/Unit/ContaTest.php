<?php

namespace Tests\Unit;

use App\Models\Conta;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ContaTest extends TestCase
{
    use DatabaseTransactions;

    public function testSaldo(): void
    {
        $conta = factory(Conta::class)->create();

        $response = $this->graphQL("
            query {
                saldo(numero_conta: $conta->numero_conta)
            }
        ");

        $response->assertJson([
            'data' => [
                'saldo' => $conta->saldo,
            ]
        ]);
    }

    public function testDeposito(): void
    {
        $conta = factory(Conta::class)->create();

        $response = $this->graphQL("
            mutation{
                depositar(numero_conta: $conta->numero_conta, valor: 200) {
                numero_conta
                saldo
                }
            }
        ");

        $response->assertJson([
            'data' => [
                'depositar' => [
                    'numero_conta' => $conta->numero_conta,
                    'saldo' => $conta->saldo + 200,
                ]
            ]
        ]);
    }

    public function testSaque(): void
    {
        $conta = factory(Conta::class)->create([
            'saldo' => 200
        ]);

        $response = $this->graphQL("
            mutation{
                sacar(numero_conta: $conta->numero_conta, valor: 200) {
                    numero_conta
                    saldo
                }
            }
        ");

        $response->assertJson([
            'data' => [
                'sacar' => [
                    'numero_conta' => $conta->numero_conta,
                    'saldo' => $conta->saldo - 200,
                ]
            ]
        ]);
    }
}
