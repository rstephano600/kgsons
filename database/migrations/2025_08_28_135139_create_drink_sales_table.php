<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('drink_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('drink_id')->constrained('drinks')->onDelete('cascade'); // drink sold
            $table->integer('quantity')->default(1); // number of drinks sold
            $table->decimal('price', 10, 2); // unit price at time of sale
            $table->decimal('total', 12, 2); // price * quantity

            $table->foreignId('service_id')->nullable()->constrained('customer_services')->onDelete('set null'); // served by staff
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');   // cashier or whoever made entry
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');   // last editor

            $table->enum('payment_method', ['cash', 'lipa', 'bank transfer'])->nullable();
            $table->boolean('is_paid')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('drink_sales');
    }
};

