<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbEstabelecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_estabelecimentos', function (Blueprint $table) {
            $table->bigIncrements('col_id');
            $table->integer('col_codigo')->nullable();
            $table->string('col_nomefantasia', 100)->nullable();
            $table->string('col_ecf', 50)->nullable();
            $table->string('col_cnpj', 50)->nullable();
            $table->text('col_endereco')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_estabelecimentos');
    }
}
