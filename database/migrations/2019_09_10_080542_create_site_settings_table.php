<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('embed_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        \App\Models\SiteSettings::create([
            'embed_code' => '<iframe src="https://www.ustream.tv/embed/23542404?html5ui" style="border: 0 none transparent;" webkitallowfullscreen allowfullscreen frameborder="no" ></iframe>'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
