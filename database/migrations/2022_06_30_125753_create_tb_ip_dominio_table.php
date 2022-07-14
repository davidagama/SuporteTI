<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbIpDominioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ip_dominio', function (Blueprint $table) {
            $table->bigIncrements('col_id');
            $table->string('col_lojas', 50);
            $table->integer('col_numero')->nullable();
            $table->string('col_ip', 30)->nullable();
            $table->string('col_iptef', 30)->nullable();
            $table->string('col_ipsom', 30)->nullable();
            $table->string('col_dominio', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_ip_dominio');
    }
}
