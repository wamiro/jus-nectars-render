<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('origins')->nullable();
            $table->string('fabrication')->nullable();
            $table->integer('price_cfa');
            $table->integer('volume_ml')->default(250);
            $table->string('range')->nullable(); // bio, premium, classique
            $table->string('occasion')->nullable(); // degustation, traiteur, epicerie
            $table->boolean('availability')->default(true);
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('products'); }
};