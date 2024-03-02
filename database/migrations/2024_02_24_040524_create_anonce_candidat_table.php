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
        Schema::create('anonce_candidat', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('candidat_id');
            $table->unsignedBigInteger('anonce_id');

            $table->foreign('candidat_id')->references('id')->on('candidats');
            $table->foreign('anonce_id')->references('id')->on('anonces');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anonce_candidat');
    }
};
