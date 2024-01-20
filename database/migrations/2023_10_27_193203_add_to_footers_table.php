<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->longText('about_us')->after('copy_right')->nullable();
            $table->string('phone')->after('about_us')->nullable();
            $table->string('location')->after('phone')->nullable();
            $table->string('email_one')->after('location')->nullable();
            $table->string('email_two')->after('email_one')->nullable();
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
            $table->dropColumn('about_us');
            $table->dropColumn('phone');
            $table->dropColumn('location');
            $table->dropColumn('email_one');
            $table->dropColumn('email_two');
        });
    }
}
