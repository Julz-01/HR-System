<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
           $table->string('email')->unique();
            $table->string('type');
           $table->string('password');
           $table->string('address')->nullable();
            $table->string('department')->nullable();
            $table->string('number')->nullable();
           $table->string('personal_email')->nullable();
           $table->string('birthdate')->nullable();
           $table->string('birthplace')->nullable();
           $table->string('nationality')->nullable();
           $table->string('religion')->nullable();
           $table->string('tin')->nullable();
           $table->string('sss')->nullable();
           $table->string('philhealth')->nullable();
           $table->string('hdmf')->nullable();
           $table->string('mother_name')->nullable();
           $table->string('father_name')->nullable();
           $table->string('civil_status')->nullable();
           $table->string('training_date')->nullable();
           $table->string('employment_date')->nullable();
           $table->string('img')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
