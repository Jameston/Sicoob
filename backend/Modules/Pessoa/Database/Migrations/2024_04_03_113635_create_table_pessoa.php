<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePessoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->bigIncrements('id_pessoa');
            $table->string('nome', 100);
            $table->string('email', 255);
            $table->string('fone', 20);
            $table->string('cep', 8)->nullable();
            $table->string('logradouro', 100);
            $table->string('numero', 100)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->integer('id_cidade')->unsigned();
           // $table->foreign('id_cidade')->references('id_cidade')->on('cidade');
            $table->integer('id_tipo')->unsigned();
            $table->boolean('status')->default('true');
            $table->string('cnpj_cpf', 14)->nullable();
            $table->string('ie_rg', 20)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa');
    }
}
