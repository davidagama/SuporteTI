<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantao', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('col_data');
            $table->timestamps();
            $table->integer('tecnicos_id')->index('fk_plantao_tecnicos1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantao');
    }
}
