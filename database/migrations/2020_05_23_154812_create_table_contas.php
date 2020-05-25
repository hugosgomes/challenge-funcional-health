<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContas extends Migration
{
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_conta');
            $table->decimal('saldo');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contas');
    }
}
