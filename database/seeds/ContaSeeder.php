<?php

use App\Models\Conta;
use Illuminate\Database\Seeder;

class ContaSeeder extends Seeder
{
    public function run()
    {
        factory(Conta::class)->create(
            [
                'numero_conta' => 54321
            ]
        );

        factory(Conta::class)->create(
            [
                'numero_conta' => 12345
            ]
        );
    }
}
