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
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->cascadeOnDelete();
            $table->enum('package_type', ['membership', 'pt']);
            $table->integer('package_type_id');
            $table->double('amount');
            $table->enum('method', ['transfer', 'qris']);
            $table->enum('status', ['pending', 'paid', 'failed', 'cancelled']);
            $table->date('paid_at')->nullable();
            $table->text('notes')->nullable();
            $table->string('proof_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_logs');
    }
};
