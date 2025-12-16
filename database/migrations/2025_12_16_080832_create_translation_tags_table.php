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
        Schema::create('translation_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('translation_id');
            $table->string('tag', 50);

            $table->index('tag');
            $table->index(['translation_id', 'tag']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translation_tags');
    }
};
