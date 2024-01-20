<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->enum('video_type', ['basic', 'pro-animation', 'youtube', 'corporate'])->default('basic');
            $table->integer('number_of_videos')->default(1);
            $table->integer('first_video_duration')->nullable();
            $table->integer('second_video_duration')->nullable();
            $table->integer('third_video_duration')->nullable();
            $table->longText('requirements')->nullable();
            $table->text('raw_data_link')->nullable();
            $table->boolean('no_data')->default(0);
            $table->boolean('fast_delivery')->default(0);
            $table->decimal('fast_delivery_charge', 8, 2)->nullable();
            $table->decimal('subtotal', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->enum('payment_status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->enum('order_status', ['init', 'pending', 'accepted', 'delivered', 'canceled'])->default('init');
            $table->timestamp('order_init_at')->nullable();
            $table->timestamp('order_accepted_at')->nullable();
            $table->timestamp('order_delivered_at')->nullable();
            $table->timestamp('order_canceled_at')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
