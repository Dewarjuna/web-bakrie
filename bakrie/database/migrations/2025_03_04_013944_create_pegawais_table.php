<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id('NIP')->Nullable();    
            $table->string('nama')->Nullable();
            $table->string('jenis kelamin')->Nullable();
            $table->string('jabatan')->Nullable();
            $table->date('tanggal aktif jabatan')->Nullable();
            $table->date('tanggal masuk')->Nullable();
            $table->string('status karyawan')->Nullable();
            $table->string('IsActive')->Nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
