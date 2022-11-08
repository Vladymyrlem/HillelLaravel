<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('posts', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('user_id');
//            $table->foreignId('category_id');
//            $table->string('title');
//            $table->text('body');
//            $table->timestamps();
//            $table->softDeletes();
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('category_id')->references('id')->on('categories');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
