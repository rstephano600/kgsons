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
Schema::create('invoices', function (Blueprint $table) {
    $table->id();
    $table->string('client');
    $table->string('invoice_number')->unique();
    $table->date('invoice_date');
    $table->date('due_date');
    $table->decimal('subtotal', 10, 2);
    $table->decimal('tax', 10, 2);
    $table->decimal('total', 10, 2);
    $table->text('notes')->nullable();
    $table->dateTime('paid_at')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
