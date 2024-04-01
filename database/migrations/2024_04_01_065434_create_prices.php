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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();

            $table->string('slot')->nullable(false);
            $table->foreign('slot')
                ->references('name_slug')
                ->on('slots');

            $table->integer('bidder_slot_id')->nullable(false);
            $table->foreign('bidder_slot_id')
                ->references('id')
                ->on('bidder_slot');

            $table->integer('price')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
