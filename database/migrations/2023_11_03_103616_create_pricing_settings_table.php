<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('basic_video_per_minute_price', 8, 2)->nullable();
            $table->decimal('fast_delivery_price', 8, 2)->nullable();
            $table->decimal('pro_animation_video_per_minute_price', 8, 2)->nullable();
            $table->decimal('youtube_video_per_minute_price', 8, 2)->nullable();
            $table->decimal('corporate_video_per_minute_price', 8, 2)->nullable();
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
        Schema::dropIfExists('pricing_settings');
    }
}
