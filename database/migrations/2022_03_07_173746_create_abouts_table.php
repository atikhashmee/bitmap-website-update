<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('company_history_title', 200)->nullable();
            $table->mediumText('compnay_history_description')->nullable();
            $table->string('heading', 200)->nullable();
            $table->longText('description')->nullable();
            $table->string('about_img', 100)->nullable();
            $table->string('headline_bg', 200)->nullable();
            $table->longText('description_bg')->nullable();
            $table->string('youtubelink', 200)->nullable();
            $table->string('image_bg', 100)->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
