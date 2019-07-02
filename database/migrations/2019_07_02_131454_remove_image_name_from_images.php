<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveImageNameFromImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
			$table->dropColumn(['image_name', 'image_description']);
			$table->string('parent_folder');
			$table->foreign('parent_folder')->references('id')->on('image_folders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
			$table->integer('image_name');
			$table->integer('image_description');
			$table->dropIfExists('parent_folder');
        });
    }
}
