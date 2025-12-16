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
        Schema::create('translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key', 191);
            $table->string('locale_code', 10);
            $table->text('content');
            $table->timestamps();

            $table->unique(['key', 'locale_code']);
            $table->index(['locale_code', 'key']);
            $table->fullText('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
