<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void { Schema::create('bike_configurations', function (Blueprint $table) { $table->id(); $table->foreignId('user_id')->constrained()->cascadeOnDelete(); $table->foreignId('bicycle_id')->constrained()->cascadeOnDelete(); $table->json('options'); $table->decimal('total_price', 10, 2); $table->timestamps(); }); } public function down(): void { Schema::dropIfExists('bike_configurations'); } };