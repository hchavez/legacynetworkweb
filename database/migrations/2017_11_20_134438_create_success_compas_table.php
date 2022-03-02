<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuccessCompasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('success_compass', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name', 50);
            $table->string('title', 50);
            $table->string('default_label');
            $table->string('fa_icon', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('success_compass');
    }
}
