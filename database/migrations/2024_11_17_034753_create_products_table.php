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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->integer('status');
            $table->integer('is_featured');
            $table->integer('sku');
            $table->integer('qty');
            $table->integer('stock_status');
            $table->double('weight', 8, 2);
            $table->double('price', 8, 2);
            $table->double('special_price', 8, 2)->nullable();
            $table->date('special_price_from')->nullable();
            $table->date('special_price_to')->nullable();
            $table->text('short_description');
            $table->text('description');
            $table->string('related_product', 300)->nullable();
            $table->string('url_key', 300);
            $table->string('meta_tag', 250);
            $table->string('meta_title', 300);
            $table->text('meta_description');
            $table->timestamps();
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
