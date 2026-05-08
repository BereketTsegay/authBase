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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            // Two-Factor Authentication Fields
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->timestamp('two_factor_confirmed_at')->nullable();
            
            // Account Status & Security
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip', 45)->nullable();
            $table->string('last_login_user_agent')->nullable();
            
            // Account Lockout Protection
            $table->integer('login_attempts')->default(0);
            $table->timestamp('locked_until')->nullable();
            
            // User Preferences
            $table->json('preferences')->nullable();
            $table->string('locale', 10)->default('en');
            $table->string('timezone', 50)->default('UTC');
            $table->string('theme', 20)->default('dark');
            
            // Team Management
            // $table->foreignId('current_team_id')->nullable()->constrained('teams')->nullOnDelete();
            
            // Profile Information
            $table->string('avatar')->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('bio')->nullable();
            $table->string('company')->nullable();
            $table->string('job_title')->nullable();
            $table->string('website')->nullable();
            $table->string('github_username')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('linkedin_username')->nullable();
            
            // Email & Notification Settings
            $table->boolean('email_notifications')->default(true);
            $table->boolean('marketing_emails')->default(false);
            $table->json('notification_preferences')->nullable();
            
            // Session Management
            $table->string('session_id')->nullable();
            $table->json('device_info')->nullable();
            
            // API Access
            $table->timestamp('api_token_last_used_at')->nullable();
            $table->timestamp('api_rate_limited_until')->nullable();
            
            // Soft Deletes
            $table->softDeletes();
            
            $table->timestamps();
            
            // Indexes for Performance
            $table->index(['email', 'is_active']);
            $table->index(['last_login_at']);
            $table->index(['is_active', 'deleted_at']);
            $table->index(['email_verified_at']);
            $table->index(['session_id']);
            $table->index(['two_factor_confirmed_at']);
            $table->index(['locked_until']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};