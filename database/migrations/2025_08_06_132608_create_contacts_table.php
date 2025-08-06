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
        Schema::create('contacts', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->string('phone')->nullable();
    $table->string('subject');
    $table->string('company')->nullable();
    $table->foreignId('service_id')->nullable()->constrained();
    $table->string('project_budget')->nullable();
    $table->text('message');
    $table->enum('status', ['new', 'in_progress', 'resolved'])->default('new');
    $table->text('notes')->nullable();
    $table->timestamps();
});

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
