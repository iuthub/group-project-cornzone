<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrueFalseQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('true_false_question_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('super_question_id');
            $table->foreign('super_question_id')->references('id')->on('super_questions');
            $table->string('answer');
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
        Schema::dropIfExists('true_false_question_answers');
    }
}
