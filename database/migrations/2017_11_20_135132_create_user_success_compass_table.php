<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSuccessCompassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_success_compass', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('success_compass_id')->unsigned();
            $table->string('label')->nullable();
            $table->timestamp('date')->nullable();
            $table->timestamp('complete_date')->nullable();
            $table->boolean('is_complete')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('success_compass_id')->references('id')->on('success_compass');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_success_compass', function (Blueprint $table) {
            $table->dropForeign('user_success_compass_user_id_foreign');
            $table->dropForeign('user_success_compass_success_compass_id_foreign');
        });

        Schema::dropIfExists('user_success_compass');
    }
}
