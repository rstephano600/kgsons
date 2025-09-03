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
        Schema::table('drink_sales', function (Blueprint $table) {
            $table->foreignId('serviced_by')->nullable()->constrained('users')->onDelete('set null')->after('total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drink_sales', function (Blueprint $table) {
            //
        });
    }
};
