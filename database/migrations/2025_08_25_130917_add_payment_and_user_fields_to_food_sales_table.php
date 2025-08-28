<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('food_sales', function (Blueprint $table) {
        // Track creator & updater
        $table->unsignedBigInteger('created_by')->nullable()->after('quantity');
        $table->unsignedBigInteger('updated_by')->nullable()->after('created_by');

        // Payment details
        $table->enum('payment_method', ['cash', 'lipa', 'bank_transfer'])->nullable()->after('updated_by');
        $table->boolean('is_paid')->default(false)->after('payment_method');
        $table->timestamp('paid_at')->nullable()->after('is_paid');

        // Add foreign keys
        $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('food_sales', function (Blueprint $table) {
        $table->dropForeign(['created_by']);
        $table->dropForeign(['updated_by']);
        $table->dropColumn(['created_by', 'updated_by', 'payment_method', 'is_paid', 'paid_at']);
    });
}

};
