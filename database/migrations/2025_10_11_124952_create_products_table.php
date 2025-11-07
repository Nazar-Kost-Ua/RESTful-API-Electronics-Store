<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique()->nullable();
            $table->unsignedBigInteger('brand_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('color_id')->index();
            $table->unsignedBigInteger('stock')->nullable();
            $table->unsignedInteger('price')->index();
            $table->string('currency', 3)->default('UAH');
            $table->unsignedBigInteger('discount_id')->nullable()->index();
            $table->string('sku')->unique();
            $table->string('slug')->unique();
            $table->string('status')->index()->default('not_active');
            $table->timestamps();
            $table->softDeletes();

            $table->index('created_at');

            $table->index(['category_id', 'price']);
            $table->index(['brand_id', 'price']);
            $table->index(['color_id', 'price']);

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
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
        Schema::dropIfExists('products');
    }
};
