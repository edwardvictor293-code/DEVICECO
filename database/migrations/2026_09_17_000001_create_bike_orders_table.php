<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bike_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('bicycle_id')->constrained()->restrictOnDelete();
            $table->string('name', 120);
            $table->string('email', 160)->index();
            $table->string('address', 220);
            $table->string('city', 100);
            $table->string('postal_code', 30);
            $table->decimal('total_price', 10, 2);
            $table->string('status', 30)->default('request_received')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bike_orders');
    }
};
