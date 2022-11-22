<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vfis', function (Blueprint $table) {
            $table->id();
            $table->string('Gender');//male or female
            $table->string('firstName') ;
            $table->string('secondName') ;
            $table->string('MaritalStatus') ;//single or married
            $table->integer('TelNo');
            $table->string('TownofResidence');
            $table->string('Fellowshipifattendingany')->nullable();//optional 
            $table->string('MinistryInvolvedin');
            $table->string('ChurchYouattend');
            $table->string('Profession')->nullable();//optional 
            $table->integer('LengthofMembershipinVFi');
            $table->string('Email');
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
        Schema::dropIfExists('vfis');
    }
};
