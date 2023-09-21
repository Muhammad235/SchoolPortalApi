<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};



//adim(fixed)
//username
//password


//admin create student/teacher

//student (oneToOne);

//first name
//last name
//student address
//gender
//email
//class
//password
//profile image


//teacher
//first name
//last name
//email
//password
//class - grade(1, 2, 3, 4, 5, 6)





