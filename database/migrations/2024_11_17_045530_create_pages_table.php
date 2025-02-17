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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('heading');
            $table->text('description');
            $table->integer('ordering');
            $table->integer('status');
            $table->string('url_key')->unique();
            $table->integer('show_in_menu');
            $table->integer('show_in_footer');
            $table->string('meta_tag',200);
            $table->string('meta_title',200);
            $table->text('meta_description');
            $table->timestamps();

          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
