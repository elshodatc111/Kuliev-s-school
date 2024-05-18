<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('all_s_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('admin');
            $table->string('status');
            $table->string('text');
            $table->timestamps();
        });
    }
    public function down(): void{
        Schema::dropIfExists('all_s_m_s');
    }
};
