<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('registered_by', ['admin', 'web', 'google'])->default('web');
            $table->enum('user_type', ['admin', 'customer'])->default('customer');
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
            $table->enum('payment_method_status', ['active', 'inactive'])->default('inactive');
            $table->timestamp('registered_at')->nullable();
            $table->tinyInteger('terms')->default(1);
            $table->string('stripe_customer_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
