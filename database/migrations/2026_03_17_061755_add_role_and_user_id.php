<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tambah kolom 'role' ke tabel users
        Schema::table('users', function (Blueprint $table) {
            // Default-nya kita jadikan 'editor'
            $table->string('role')->default('editor')->after('email');
        });

        // 2. Tambah kolom 'user_id' ke tabel posts
        Schema::table('posts', function (Blueprint $table) {
            // nullable() karena artikel lamamu belum ada penulisnya
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
