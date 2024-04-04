<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->bigIncrements('id_produto');
            $table->string('descricao', 100);
            $table->decimal('preco', 18, 4)->default('0.01');
            $table->decimal('custo', 18, 4)->default('0.00');
            $table->boolean('status')->default(true);
            $table->text('observacao')->nullable();
            $table->string('codigo_barras', 20)->nullable();
            $table->decimal('quantidade', 18, 4)->nullable()->default('0.00');
            $table->integer('id_empresa')->unsigned();
            $table->foreign('id_empresa')->references('id_empresa')->on('empresa');
            $table->integer('id_uni_medida')->unsigned()->nullable();
            $table->foreign('id_uni_medida')->references('id_uni_medida')->on('produto_uni_medida');
            $table->integer('id_grupo')->unsigned()->nullable();
            $table->foreign('id_grupo')->references('id_produto_grupo')->on('produto_grupo');
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
        Schema::dropIfExists('produto');
    }
}
