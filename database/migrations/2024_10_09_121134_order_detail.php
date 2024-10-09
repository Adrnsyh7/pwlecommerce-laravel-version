<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id('detail_id'); // Primary key dengan tipe auto-increment integer
            $table->string('order_id', 10)->charset('utf8mb4')->collation('utf8mb4_0900_ai_ci');
            $table->string('item_id', 10)->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->unsignedBigInteger('quantity');
            $table->decimal('subtotal', 16, 0);
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('updated_at')->nullable();

            // Foreign key constraints
            $table->foreign('order_id')->references('order_id')->on('order_tx')->onDelete('cascade');
            $table->foreign('item_id')->references('item_id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('order_detail');
    }
};
