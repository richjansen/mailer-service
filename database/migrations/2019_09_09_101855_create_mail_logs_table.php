<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_logs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('mail_id');
            $table->foreign('mail_id')->references('id')->on('mails');

            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('mail_statusses');

            $table->unsignedBigInteger('mail_service_id');
            $table->foreign('mail_service_id')->references('id')->on('mail_services');

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
        Schema::dropIfExists('mail_logs');
    }
}
