<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryTopSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_top_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_left_image')->nullable();
            $table->string('section_right_top_image')->nullable();
            $table->string('section_right_bottom_left_image')->nullable();
            $table->string('section_right_bottom_right_image')->nullable();
            $table->string('background_color')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_background_color')->nullable();
            $table->string('button_hover_color')->nullable();
            $table->string('button_text_color')->nullable();
            $table->string('button_text_hover_color')->nullable();
            $table->string('button_border_color')->nullable();
            $table->string('button_hover_border_color')->nullable();
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
        Schema::dropIfExists('gallery_top_sections');
    }
}
