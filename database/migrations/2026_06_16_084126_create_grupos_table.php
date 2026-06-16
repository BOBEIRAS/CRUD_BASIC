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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('grupo')->unique();
            $table->timestamps();
        });

        Schema::create('contacto_grupo', function (Blueprint $table) {
            $table->foreignId('contacto_id')->constrained();
            $table->foreignId('grupo_id')->constrained();
            $table->primary(['contacto_id', 'grupo_id']);
            $table->unique(['contacto_id','grupo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto_grupo');
        Schema::dropIfExists('grupos');
    }
};
