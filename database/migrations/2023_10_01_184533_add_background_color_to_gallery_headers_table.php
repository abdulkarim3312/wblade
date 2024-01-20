<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBackgroundColorToGalleryHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('gallery_headers', 'video')) {
            Schema::table('gallery_headers', function (Blueprint $table) {
                $table->string('background_color')->nullable()->after('sub_title');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallery_headers', function (Blueprint $table) {
            //
        });
    }
}
