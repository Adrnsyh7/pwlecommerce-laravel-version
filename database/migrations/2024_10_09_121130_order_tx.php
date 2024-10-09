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
        Schema::create('order_tx', function (Blueprint $table) {
            $table->string('order_id', 10)->charset('utf8mb4')->collation('utf8mb4_0900_ai_ci')->primary();
            $table->timestamp('order_date');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('order_total', 16, 0);
            $table->string('order_status', 20)->collation('utf8mb4_unicode_ci');
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('updated_at')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('order_tx');
    }
};
