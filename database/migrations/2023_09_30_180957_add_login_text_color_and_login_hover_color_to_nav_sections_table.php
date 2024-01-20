<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLoginTextColorAndLoginHoverColorToNavSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('nav_sections', 'login_text_color')) {
            Schema::table('nav_sections', function (Blueprint $table) {
                $table->string('login_text_color')->nullable()->after('text_color');
            });
        }
        if (!Schema::hasColumn('nav_sections', 'login_hover_color')) {
            Schema::table('nav_sections', function (Blueprint $table) {
                $table->string('login_hover_color')->nullable()->after('login_text_color');
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
        
    }
}
