<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->string('telephone_number');
            $table->string('email');
            $table->text('content');
            $table->string('file')->nullable();
            $table->unsignedBigInteger('topic_id');
            $table->timestamps();
            $table->foreign('topic_id', 'ix_feedbacks_topic_id')->references('id')->on('topics_dict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calendar_events', function (Blueprint $table) {
            $table->dropForeign(['ix_feedbacks_topic_id']);
        });
        Schema::dropIfExists('feedbacks');
    }
}
