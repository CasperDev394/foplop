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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();

            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('name_slug')->nullable(false)->unique();
            $table->string('sex')->nullable();
            $table->date('birthday')->nullable();
            $table->string('img')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
