<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Chạy migration để tạo bảng orders.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 255);
            $table->string('customer_email', 255);
            $table->string('customer_phone', 20);
            $table->text('customer_address');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Hoàn tác migration, xóa bảng orders.
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
