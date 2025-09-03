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
        Schema::table('food_sales', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign(['service_id']);
            // Then drop the column
            $table->dropColumn('service_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food_sales', function (Blueprint $table) {
            // Recreate the column
            $table->unsignedBigInteger('service_id')->nullable();

            // Restore the foreign key (assuming it references services.id)
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }
};
