<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bicycles', function (Blueprint $table) {
            $table->id(); $table->string('name'); $table->string('slug')->unique(); $table->string('category')->index(); $table->string('tagline'); $table->text('description'); $table->decimal('price', 10, 2); $table->decimal('weight', 4, 1); $table->string('frame_material'); $table->string('wheel_info'); $table->string('drivetrain'); $table->string('brakes'); $table->string('image_url'); $table->boolean('featured')->default(false); $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bicycles');
    }
};