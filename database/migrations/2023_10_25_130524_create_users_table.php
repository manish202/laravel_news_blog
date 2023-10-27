<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements("uid");
            $table->string("fname",50);
            $table->string("lname",50);
            $table->string("uname",80);
            $table->string("pword",100);
            $table->integer("role")->default(2);
            $table->integer("post_under_user")->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
