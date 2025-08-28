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
        $table->foreignId('service_id')->nullable()->constrained('customer_services')->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food_sales', function (Blueprint $table) {
            //
        });
    }
};
