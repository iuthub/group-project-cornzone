<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultipleQuestionOptionSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_question_option_sets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('MQA_id');
            $table->foreign('MQA_id')->references('id')->on('multiple_question_answers');
            $table->string('text');
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
        Schema::dropIfExists('multiple_question_option_sets');
    }
}
