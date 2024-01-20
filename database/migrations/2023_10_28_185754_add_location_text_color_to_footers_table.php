<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationTextColorToFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->string('location_text_color')->after('text_hover_color')->nullable();
            $table->string('contact_text_color')->after('location_text_color')->nullable();
            $table->string('social_icon_color')->after('contact_text_color')->nullable();
            $table->string('social_background_color')->after('social_icon_color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->dropColumn('location_text_color');
            $table->dropColumn('contact_text_color');
            $table->dropColumn('social_icon_color');
            $table->dropColumn('social_background_color');
        });
    }
}
