<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Crafted Portfolio');
            $table->string('tagline')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_cta_text')->nullable();
            $table->string('hero_cta_link')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_subtitle')->nullable();
            $table->text('footer_text')->nullable();
            $table->json('social_links')->nullable();
            $table->string('resume_url')->nullable();
            $table->string('current_focus')->nullable();
            $table->string('theme')->default('dark');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
