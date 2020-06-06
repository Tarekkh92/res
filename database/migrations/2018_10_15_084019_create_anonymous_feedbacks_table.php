<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Servicio\AnonymousFeedback;
class CreateAnonymousFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anonymous_feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serviceRate',191);
            $table->string('foodRate',191);
            $table->string('sanitationRate',191);
            $table->string('musicRate',191);
            $table->mediumText('body');
            $table->float('averageUser');
            $table->integer('restaurantID');
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
        Schema::dropIfExists('anonymous_feedbacks');
    }
}
