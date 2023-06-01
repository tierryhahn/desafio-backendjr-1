<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('idade');
            $table->string('cpf');
            $table->string('rg');
            $table->date('data_nasc');
            $table->string('sexo');
            $table->string('signo');
            $table->string('mae');
            $table->string('pai');
            $table->string('email');
            $table->string('senha');
            $table->string('cep');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('telefone_fixo');
            $table->string('celular');
            $table->decimal('altura', 5, 2);
            $table->decimal('peso', 5, 2);
            $table->string('tipo_sanguineo');
            $table->string('cor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
