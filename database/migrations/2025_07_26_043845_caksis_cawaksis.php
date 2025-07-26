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
        Schema::create('kandidat', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('visi');
            $table->string('misi');
            $table->string('foto')->nullable();
            $table->enum ('calon_jabatan', ['caksis', 'cawaksis']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
