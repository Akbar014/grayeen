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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('ptitle');
            $table->string('pclient')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('plocation')->nullable();
            $table->string('tba')->nullable();
            $table->string('land_area')->nullable();
            $table->string('period')->nullable();
            $table->string('status');
            $table->string('design_team')->nullable();
            $table->string('video')->nullable();
            $table->longText('pdescription')->nullable();
            $table->integer('priority')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
