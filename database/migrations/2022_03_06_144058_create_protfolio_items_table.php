<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtfolioItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protfolio_items', function (Blueprint $table) {
            $table->id();
            $table->string('project_title');
            $table->unsignedBigInteger('proftfolio_category_id');
            $table->text('about_project')->nullable();
            $table->text('detail_description')->nullable();
            $table->dateTime('project_date');
            $table->string('client');
            $table->string('project_location');
            $table->string('video_demo_link');
            $table->string('video_description');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('proftfolio_category_id')->references('id')->on('proftfolio_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('protfolio_items');
    }
}
