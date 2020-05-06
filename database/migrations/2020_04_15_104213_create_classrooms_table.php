<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->unsignedBigInteger('tutor_id');
            $table->unsignedBigInteger('student_id');
            $table->boolean('status')->default(1);
            $table->unique('tutor_id','student_id');
            $table->timestamps();
            // if the tutor profile is deleted, this classrooms is deleted
            $table->foreign('tutor_id')
                ->references('id')
                ->on('tutors')
                ->onDelete('cascade');
            // if the student profile is deleted, this classrooms is deleted
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');
        });
        Schema::table('chatrooms', function (Blueprint $table) {
            // if the classrooms is deleted, this chatroom is deleted
            $table->foreign('classroom_id')
                ->references('id')
                ->on('classrooms')
                ->onDelete('cascade');
        });
        Schema::table('posts', function (Blueprint $table) {
            // if the classrooms is deleted, this post is deleted
            $table->foreign('classroom_id')
                ->references('id')
                ->on('classrooms')
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
        Schema::dropIfExists('classrooms');
    }
}
