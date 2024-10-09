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
        Schema::create('order_produk', function (Blueprint $table) {
            $table->string('order_id', 10)->charset('utf8mb4')->collation('utf8mb4_general_ci')->primary();
            $table->timestamp('order_date')->useCurrent()->useCurrentOnUpdate();
            $table->bigInteger('customer_id');
            $table->decimal('order_total', 16, 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('order_produk');
    }
};
