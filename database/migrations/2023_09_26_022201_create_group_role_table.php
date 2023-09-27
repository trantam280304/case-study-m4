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
        Schema::create('group_role', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('group_id')->constrained('groups');
            $table->foreignId('role_id')->constrained('roles');
            $table->timestamps();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_role');
    }
};
