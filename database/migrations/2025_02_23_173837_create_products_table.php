<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Chạy migration để tạo bảng products.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // Giới hạn độ dài 255 ký tự
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable(); // Lưu đường dẫn ảnh
            $table->timestamps();
        });
    }

    /**
     * Hoàn tác migration, xóa bảng products.
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
