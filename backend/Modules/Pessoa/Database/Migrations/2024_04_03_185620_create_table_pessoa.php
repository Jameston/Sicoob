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
            $table->integer('id_pessoa_tipo')->unsigned()->nullable();
            $table->foreign('id_pessoa_tipo')->references('id_pessoa_tipo')->on('pessoa_tipo');
            $table->string('nome', 70);
            $table->string('cnpj_cpf', 14)->nullable();
            $table->string('ie_rg', 20)->nullable();
            $table->string('cep', 8)->nullable();
            $table->string('logradouro', 255)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->integer('id_cidade')->unsigned()->nullable();
            $table->foreign('id_cidade')->references('id_cidade')->on('cidade');
            $table->string('email', 100)->nullable();
            $table->string('telefone', 14)->nullable();
            $table->boolean('status')->default(true);
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
