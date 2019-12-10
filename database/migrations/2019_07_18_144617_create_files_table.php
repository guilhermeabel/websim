<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('name');
            $table->string('dist')->default(false);
            // dados de matematica discreta
            # [0]mediana, [1]media_aritmetica, [2]desvio_padrao, [3]variancia, [4]moda
            $table->string('median');
            $table->string('mean');
            $table->string('stdev');
            $table->string('var');
            $table->string('mode');
            //
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
        Schema::dropIfExists('files');
    }
}