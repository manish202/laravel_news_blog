<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements("pid");
            $table->string("ptitle",100);
            $table->text("pdesc");
            $table->string("pimage",100);
            $table->bigInteger("pcat")->unsigned();
            $table->foreign("pcat")->references("cid")->on("category");
            $table->bigInteger("pauthor")->unsigned();
            $table->foreign("pauthor")->references("uid")->on("users");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
