<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTicketTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_ticket_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('support_ticket_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('support_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->string('subject');
            $table->text('description');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')
                ->on('support_ticket_statuses');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')
                ->on('support_ticket_categories');
            $table->timestamp('closed_date')->nullable();
            $table->integer('closed_by_id')->unsigned()->nullable();
            $table->foreign('closed_by_id')->references('id')
                ->on('users');
            $table->string('attachment')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('support_ticket_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('support_ticket_id')->unsigned()->nullable();
            $table->foreign('support_ticket_id')->references('id')
                ->on('support_tickets');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users');
            $table->text('comment');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('support_ticket_comments');
        Schema::dropIfExists('support_tickets');
        Schema::dropIfExists('support_ticket_categories');
        Schema::dropIfExists('support_ticket_statuses');
    }
}
