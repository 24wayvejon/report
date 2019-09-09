<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->string('student_no', 10);
            $table->primary('student_no');
            $table->string('primary', 150);
            $table->string('primary_sy', 9);
            $table->string('intermediate', 150);
            $table->string('intermediate_sy', 9);
            $table->string('secondary', 150);
            $table->string('secondary_sy', 9 );
            $table->date('date_admitted');
            $table->date('date_graduated')->nullable();
            $table->string('student_type', 10);
            $table->integer('curriculum_id')->unsigned();
            $table->foreign('curriculum_id')->references('curriculum_id')->on('curriculum')->onUpdate('cascade');
            $table->string('acad_term_admitted_id', 6);
            $table->foreign('acad_term_admitted_id')->references('acad_term_id')->on('acad_term')->onUpdate('cascade');
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('student');
    }
}
