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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable(false);
            $table->string('name_slug')->nullable(false)->unique();
            $table->boolean('published')->default(false)->nullable(false);

            $table->string('debtor')->nullable(false);
            $table->foreign('debtor')
                ->references('name_slug')
                ->on('debtors');

            $table->string('link')->nullable();
            $table->string('location')->nullable();
            $table->json('documents')->nullable();
            $table->integer('court_id')->nullable(false);
            $table->foreign('court_id')
                ->references('id')
                ->on('courts');

            $table->string('case_number')->nullable();
            $table->string('category')->nullable(false);
            $table->foreign('category')
                ->references('name_slug')
                ->on('categories');

            $table->string('broker')->nullable(false);
            $table->foreign('broker')
                ->references('name_slug')
                ->on('brokers');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};
