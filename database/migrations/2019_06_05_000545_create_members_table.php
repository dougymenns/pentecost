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
			$table->string('Member_Type')->nullable();
			$table->string('Member_Id')->nullable();
			$table->string('First_Name')->nullable();
			$table->string('Last_Name')->nullable();
			$table->string('Marital_Status')->nullable();
			$table->string('Title')->nullable();
			$table->string('Gender')->nullable();
			$table->string('Email')->unique()->nullable();
			$table->integer('Phone')->nullable();
			$table->string('Nationality')->nullable();
			$table->string('Date_of_Birth')->nullable();
			$table->string('Date_Joined')->nullable();
			$table->integer('Secondary_Phone')->nullable();
			$table->string('Emergency_Contact_Person')->nullable();
			$table->integer('Phone_of_Emergency_Contact')->nullable();
			$table->string('Postal_Address')->nullable();
			$table->string('Hometown')->nullable();
			$table->string('Residential_Address')->nullable();
			$table->string('Membership_Status')->nullable();
			$table->string('Member_Active_Group')->nullable();
			$table->string('Membership_Position')->nullable();
			$table->string('Year_Joined')->nullable();
			$table->string('Special_Gift')->nullable();
			$table->string('Previous_Church')->nullable();
			$table->string('Position_Held_in_Previous_Church')->nullable();
			$table->string('New_Birth_Baptism')->nullable();
			$table->string('Water_Baptism')->nullable();
			$table->string('Holy_Spirit_Baptism')->nullable();
			$table->string('Family_Relation')->nullable();
			$table->string('Relation_Name')->nullable();
			$table->string('Relation_Phone_Number')->nullable();
			$table->string('Relation_Email')->nullable();
			$table->string('Next_of_Kin')->nullable();
			$table->string('Next_of_Kin_Contact')->nullable();
			$table->string('Member_Occupation_Industry')->nullable();
			$table->string('Member_Specific_Job')->nullable();
			$table->string('Institution_of_Employment')->nullable();
			$table->string('Date_of_Employment_From')->nullable();
			$table->string('Date_of_Employment_To')->nullable();
			$table->string('Educational_Level')->nullable();
			$table->string('Educational_Institution')->nullable();
			$table->string('Certification')->nullable();
			$table->string('Certification_Date_From')->nullable();
			$table->string('Certification_Date_To')->nullable();
			$table->string('Signed_By')->nullable();
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
