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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->boolean('is_active')->default(false);

            $table->foreign('parent_id')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('discount_id')
                ->references('id')
                ->on('discounts')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
