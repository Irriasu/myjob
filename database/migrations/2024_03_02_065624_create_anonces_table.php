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
        Schema::create('anonces', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("poste");
            $table->text("description");
            $table->text("skills");
            $table->text("avantages");
            $table->unsignedBigInteger('rucruter_id');
            
            
            $table->foreign('rucruter_id')->references('id')->on('rucruters');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anonces');
    }
};
