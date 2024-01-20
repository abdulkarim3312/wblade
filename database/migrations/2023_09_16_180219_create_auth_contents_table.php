<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_contents', function (Blueprint $table) {
            $table->id();
            $table->string('background_color')->nullable();
            $table->string('background_image')->nullable();
            $table->string('button_background_color')->nullable();
            $table->string('button_hover_color')->nullable();
            $table->string('button_text_color')->nullable();
            $table->string('button_text_hover_color')->nullable();
            $table->string('button_border_color')->nullable();
            $table->string('button_hover_border_color')->nullable();
            $table->string('google_button_background_color')->nullable();
            $table->string('google_button_hover_color')->nullable();
            $table->string('google_button_text_color')->nullable();
            $table->string('google_button_text_hover_color')->nullable();
            $table->string('google_button_border_color')->nullable();
            $table->string('google_button_hover_border_color')->nullable();
            $table->string('input_background_color')->nullable();
            $table->string('input_border_color')->nullable();
            $table->string('input_placeholder_color')->nullable();
            $table->string('input_placeholder_click_color')->nullable();
            $table->string('card_background_color')->nullable();
            $table->string('forgot_password_link_color')->nullable();
            $table->string('forgot_password_link_hover_color')->nullable();
            $table->string('agreement_color')->nullable();
            $table->string('agreement_link_color')->nullable();
            $table->string('agreement_link_hover_color')->nullable();
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
        Schema::dropIfExists('auth_contents');
    }
}
