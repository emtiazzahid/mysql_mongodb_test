<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('email_logs', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('site_id');
//            $table->unsignedBigInteger('email_id');
//            $table->uuid('subscriber_id');
//            $table->text('log')->nullable();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('email_logs');
    }
}
