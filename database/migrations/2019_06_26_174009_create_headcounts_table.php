<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadcountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headcounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('service');
            $table->time('time');
            $table->string('session');
            $table->string('activity');
            $table->string('topic');
            $table->string('preacher');
            $table->text('headcount');
            $table->text('remarks');
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
        Schema::dropIfExists('headcounts');
    }
}
