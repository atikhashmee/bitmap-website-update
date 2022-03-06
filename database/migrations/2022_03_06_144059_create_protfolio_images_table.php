<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtfolioImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protfolio_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('protfolios_id');
            $table->foreign('protfolios_id')->references('id')->on('protfolio_items')->onDelete('cascade');
            $table->string('images', 200)->nullable();
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
        Schema::dropIfExists('protfolio_images');
    }
}
