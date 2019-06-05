<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('title')->nullable();
			$table->string('First_Name');
			$table->string('Last_Name');
			$table->string('Avatar');
			$table->string('Date_of_Birth');
			$table->string('Nationality')->nullable();
			$table->string('Hometown')->nullable();
			$table->string('email')->unique();
			$table->string('Gender');
			$table->string('contact')->unique()->nullable();
			$table->string('address')->nullable();
			$table->string('emergency_contact_person')->nullable();
			$table->string('family_contact')->nullable();
			$table->string('family_relation')->nullable();
			$table->string('school_name')->nullable();
			$table->string('educational_level')->nullable();
			$table->string('previous_church')->nullable();
			$table->string('year_joined')->nullable();
			$table->string('position')->nullable();
			$table->string('Baptism_status')->nullable();
			$table->string('special_gift')->nullable();
			$table->string('ministry')->nullable();
			$table->string('occupation_status')->nullable();
			$table->string('company_name')->nullable();
			$table->string('company_location')->nullable();
			$table->string('work_status')->nullable();
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
        Schema::dropIfExists('members');
    }
}
