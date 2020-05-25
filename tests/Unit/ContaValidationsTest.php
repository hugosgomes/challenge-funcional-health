<?php

namespace Tests\Unit;

use App\Models\Conta;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ContaExceptionsTest extends TestCase
{
    use DatabaseTransactions;

    public function testSaldoComContaNaoExistente(): void
    {
        $response = $this->graphQL("
            query {
                saldo(numero_conta: 9999999)
            }
        ");

        $response->assertJson([
            'errors' => [
                [
                    'message' => 'The given data was invalid.',
                    'extensions' => [
                        'validation' => [
                            'numero_conta' => ['Conta não existente']
                        ],
                        'category' => 'validation'
                    ],
                ]
            ]
        ]);
    }

    public function testDepositoComContaNaoExistente(): void
    {
        $response = $this->graphQL("
            mutation{
                depositar(numero_conta: 999999, valor: 200) {
                numero_conta
                saldo
                }
            }
        ");

        $response->assertJson([
            'errors' => [
                [
                    'message' => 'The given data was invalid.',
                    'extensions' => [
                        'validation' => [
                            'numero_conta' => ['Conta não existente']
                        ],
                        'category' => 'validation'
                    ],
                ]
            ]
        ]);
    }

    public function testDepositoComValorNegativo(): void
    {
        $conta = factory(Conta::class)->create();

        $response = $this->graphQL("
            mutation{
                depositar(numero_conta: $conta->numero_conta, valor: -200) {
                numero_conta
                saldo
                }
            }
        ");

        $response->assertJson([
            'errors' => [
                [
                    'message' => 'The given data was invalid.',
                    'extensions' => [
                        'validation' => [
                            'valor' => ['Valor Inválido.']
                        ],
                        'category' => 'validation'
                    ],
                ]
            ]
        ]);
    }

    public function testSaqueComValorAcimaDoSaldo(): void
    {
        $conta = factory(Conta::class)->create();

        $response = $this->graphQL("
            mutation{
                sacar(numero_conta: $conta->numero_conta, valor: 200) {
                    numero_conta
                    saldo
                }
            }
        ");

        $response->assertJson([
            'errors' => [
                [
                    'message' => 'The given data was invalid.',
                    'extensions' => [
                        'validation' => [
                            'valor' => ['Saldo insuficiente.']
                        ],
                        'category' => 'validation'
                    ],
                ]
            ]
        ]);
    }

    public function testSaqueComContaNaoExistente(): void
    {
        $response = $this->graphQL("
            mutation{
                sacar(numero_conta: 999999, valor: 200) {
                    numero_conta
                    saldo
                }
            }
        ");

        $response->assertJson([
            'errors' => [
                [
                    'message' => 'The given data was invalid.',
                    'extensions' => [
                        'validation' => [
                            'numero_conta' => ['Conta não existente']
                        ],
                        'category' => 'validation'
                    ],
                ]
            ]
        ]);
    }

    public function testSaqueComValorNegativo(): void
    {
        $conta = factory(Conta::class)->create();

        $response = $this->graphQL("
            mutation{
                sacar(numero_conta: $conta->numero_conta, valor: -200) {
                numero_conta
                saldo
                }
            }
        ");

        $response->assertJson([
            'errors' => [
                [
                    'message' => 'The given data was invalid.',
                    'extensions' => [
                        'validation' => [
                            'valor' => ['Valor Inválido.']
                        ],
                        'category' => 'validation'
                    ],
                ]
            ]
        ]);
    }
}
