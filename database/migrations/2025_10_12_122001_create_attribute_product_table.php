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
        Schema::create('attribute_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('attribute_id')->index();
            $table->string('value')->nullable()->index();

            $table->primary(['product_id', 'attribute_id']);
            $table->unique(['product_id', 'attribute_id', 'value']);

            $table->index(['product_id', 'attribute_id', 'value']);

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('attribute_id')
                ->references('id')
                ->on('attributes')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_product');
    }
};
