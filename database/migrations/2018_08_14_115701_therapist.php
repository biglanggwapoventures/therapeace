<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Therapist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('image');
            $table->string('fname');
            $table->string('lname');
            $table->string('contact');
            $table->string('gender');
            $table->string('barangay');
            $table->string('province');
            $table->string('town');
            $table->string('city');
            $table->string('therapist');
            $table->string('license_number');
            $table->string('expiry_date');
            $table->string('license_image');
            $table->string('nbi_image');
            $table->string('bp_image');
            $table->rememberToken();
            $table->timestamps();


            
        });
          Schema::table('therapists', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('therapists');
    }
}
