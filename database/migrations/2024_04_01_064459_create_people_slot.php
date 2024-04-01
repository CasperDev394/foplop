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
        Schema::create('people_slot', function (Blueprint $table) {
            $table->id();

            $table->string('people')->nullable(false);
            $table->foreign('people')
                ->references('name_slug')
                ->on('peoples');

            $table->string('slot')->nullable(false);
            $table->foreign('slot')
                ->references('name_slug')
                ->on('slots');

            $table->string('role')->nullable();


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_slot');
    }
};
