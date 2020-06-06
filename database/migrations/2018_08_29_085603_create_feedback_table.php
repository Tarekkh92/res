<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('feedback', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->timestamps();
        // });
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName',191);
            $table->string('email',191);
            $table->string('phone',191);
            $table->string('serviceRate',191);
            $table->string('foodRate',191);
            $table->string('sanitationRate',191);
            $table->string('musicRate',191);
            $table->mediumText('body');
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
        Schema::dropIfExists('feedbacks');
    }
}
