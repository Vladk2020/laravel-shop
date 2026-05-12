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
        Schema::table('orders', function (Blueprint $table) {
            // Додаємо колонку product_id після user_id та створюємо зовнішній ключ (Foreign Key)
            $table->foreignId('product_id')->after('user_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Видаляємо зв'язок та саму колонку
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
};
