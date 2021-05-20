<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('quizzes');
            $table->unsignedBigInteger('question_type_id');
            $table->foreign('question_type_id')->references('id')->on('question_types');
            $table->timestamps();
            $table->unsignedInteger('points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('super_questions');

    }
}
