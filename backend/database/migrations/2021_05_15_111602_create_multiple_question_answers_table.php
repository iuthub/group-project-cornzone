<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultipleQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_question_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('super_question_id');
            $table->foreign('super_question_id')->references('id')->on('super_questions');
            $table->string('answer');
            $table->unsignedBigInteger('option_set_id');
            $table->foreign('option_set_id')->references('id')->on('multiple_question_option_sets');
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
        Schema::dropIfExists('multiple_question_answers');
    }
}
