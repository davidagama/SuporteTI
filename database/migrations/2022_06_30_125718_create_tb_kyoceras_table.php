<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKyocerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kyoceras', function (Blueprint $table) {
            $table->bigIncrements('col_id');
            $table->string('col_local', 50)->nullable();
            $table->string('col_setor', 50)->nullable();
            $table->string('col_modelo', 50)->nullable();
            $table->string('col_numserie', 50)->nullable();
            $table->string('col_ipinterno', 50)->nullable();
            $table->string('col_mac', 50)->nullable();
            $table->text('col_obs')->nullable();
            $table->string('col_endereco', 100)->nullable();
            $table->integer('col_id_tabela')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kyoceras');
    }
}
