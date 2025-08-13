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
        schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('nis')->unique();
            $table->string ('password')->nullable();
            $table->enum ('role', ['admin', 'user'])->default('user');
            $table->string('nama_ibu');
            $table->enum('vote_status', ['belum', 'sudah'])->default('belum');
            $table->timestamps();

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
