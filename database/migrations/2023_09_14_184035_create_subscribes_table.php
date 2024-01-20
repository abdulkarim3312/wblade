<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
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
        Schema::dropIfExists('subscribes');
    }
}
