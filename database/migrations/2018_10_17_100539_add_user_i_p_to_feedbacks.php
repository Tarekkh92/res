<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIPToFeedbacks extends Migration
{
        public function up()
    {
        Schema::table('feedbacks', function($table) {
            $table->string('userIP',191);
            $table->string('userAGENT',191);
        });
    }

    public function down()
    {
        Schema::table('feedbacks', function($table) {
            $table->dropColumn('userIP',191);
            $table->dropColumn('userAGENT',191);
        });
    }
}
