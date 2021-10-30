<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalRatingsFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->json('additional_ratings');
            $table->string('attachment_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('feedbacks', 'additional_ratings')) {
            Schema::table('feedbacks', function (Blueprint $table) {
                $table->dropColumn('additional_ratings');
                $table->dropColumn('attachment_url');
            });
        }
    }
}
