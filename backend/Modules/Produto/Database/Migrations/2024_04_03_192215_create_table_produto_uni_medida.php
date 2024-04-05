<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProdutoUniMedida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_uni_medida', function (Blueprint $table) {
            $table->bigIncrements('id_uni_medida');
            $table->string('unidade', 3);
            $table->string('descricao', 100);
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('produto_uni_medida');
    }
}
