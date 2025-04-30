<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('socks', function (Blueprint $table) {
            $table->id();
            $table->string('color')->comment('Цвет');
            $table->unsignedTinyInteger('cottonPart')->comment('Содержание хлопка %');
            $table->unsignedInteger('quantity')->comment('Количество');
            $table->timestamps();
            $table->unique(['color', 'cottonPart']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('socks');
    }
};
