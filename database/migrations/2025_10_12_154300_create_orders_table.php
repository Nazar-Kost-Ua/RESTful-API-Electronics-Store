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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_ref')->unique();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('delivery_type_id')->index();
            $table->unsignedBigInteger('payment_method_id')->index();
            $table->unsignedInteger('subtotal')->nullable()->index();
            $table->unsignedInteger('total')->nullable()->index();
            $table->string('currency')->nullable()->index()->default('UAH');
            $table->string('status')->default('pending')->index();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('delivery_type_id')
                ->references('id')
                ->on('delivery_types')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
