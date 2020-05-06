<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('address');
            $table->unsignedBigInteger('user_id');
            $table->boolean('status')->default(1);
            $table->string('profile_image')->default('default.jpg');
            $table->date('DoB');
            $table->string('gender');
            $table->timestamps();
            // if the user account is deleted, this profile is deleted
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
