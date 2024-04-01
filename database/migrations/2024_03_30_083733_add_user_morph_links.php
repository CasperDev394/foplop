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
        Schema::table('users', function (Blueprint $table) {
            DB::statement("create type user_types_list as enum ('ADMIN', 'BIDDER', 'BROKER')");
            DB::statement("alter table users add entity_type user_types_list");


            Schema::table('users', function (Blueprint $table) {
                $table->bigInteger('entity_id')->nullable(false);
                $table->string('phone', 255)->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('entity_type');
            $table->dropColumn('entity_id');
            $table->dropColumn('phone');
        });
    }
};
