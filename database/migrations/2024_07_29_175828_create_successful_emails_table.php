<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuccessfulEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('successful_emails')) {
            Schema::create('successful_emails', function (Blueprint $table) {
                $table->id();
                $table->mediumInteger('affiliate_id');
                $table->text('envelope');
                $table->string('from', 255);
                $table->text('subject');
                $table->string('dkim', 255)->nullable();
                $table->string('SPF', 255)->nullable();
                $table->float('spam_score')->nullable();
                $table->longText('email');
                $table->longText('raw_text')->nullable();
                $table->string('sender_ip', 50)->nullable();
                $table->text('to');
                $table->integer('timestamp');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('successful_emails');
    }
}
