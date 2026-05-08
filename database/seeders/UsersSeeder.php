<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use App\Enums\PermissionsEnum;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Super Admin User
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'locale' => 'en',
            'timezone' => 'UTC',
            'theme' => 'dark',
            'email_notifications' => true,
            'job_title' => 'System Administrator',
            'company' => 'Enterprise Inc',
            'bio' => 'Super Administrator with full system access',
        ]);
        $superAdmin->assignRole('super-admin');

        // Create Admin User
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'locale' => 'en',
            'timezone' => 'America/New_York',
            'theme' => 'dark',
            'email_notifications' => true,
            'job_title' => 'Administrator',
            'company' => 'Enterprise Inc',
            'bio' => 'System Administrator with most permissions',
            'phone' => '+1 (555) 123-4567',
            'github_username' => 'admin-user',
            'twitter_username' => '@admin',
        ]);
        $admin->assignRole('admin');

        // Create Manager User
        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'locale' => 'en',
            'timezone' => 'Europe/London',
            'theme' => 'dark',
            'email_notifications' => true,
            'job_title' => 'Team Manager',
            'company' => 'Enterprise Inc',
            'bio' => 'Team Manager with team management permissions',
            'phone' => '+44 20 1234 5678',
        ]);
        $manager->assignRole('manager');

        // Create Editor User
        $editor = User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'locale' => 'en',
            'timezone' => 'Asia/Tokyo',
            'theme' => 'dark',
            'email_notifications' => true,
            'job_title' => 'Content Editor',
            'company' => 'Enterprise Inc',
            'bio' => 'Content Editor with content management permissions',
            'website' => 'https://editor.example.com',
        ]);
        $editor->assignRole('editor');

        // Create Regular User
        $regularUser = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'locale' => 'en',
            'timezone' => 'Australia/Sydney',
            'theme' => 'dark',
            'email_notifications' => false,
            'marketing_emails' => true,
            'job_title' => 'Staff Member',
            'company' => 'Enterprise Inc',
            'bio' => 'Regular user with basic access',
        ]);
        $regularUser->assignRole('user');

        // Create Inactive User (for testing)
        $inactiveUser = User::create([
            'name' => 'Inactive User',
            'email' => 'inactive@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_active' => false,
            'locale' => 'en',
            'timezone' => 'UTC',
            'theme' => 'dark',
            'email_notifications' => true,
            'job_title' => 'Former Staff',
            'company' => 'Enterprise Inc',
            'bio' => 'This account is inactive',
        ]);
        $inactiveUser->assignRole('user');

        // Create Demo Users with Different Roles and Teams
        $demoUsers = [
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'role' => 'manager',
                'job_title' => 'Project Manager',
                'team' => 'Product Development',
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bob@example.com',
                'role' => 'editor',
                'job_title' => 'Content Creator',
                'team' => 'Marketing',
            ],
            [
                'name' => 'Carol Davis',
                'email' => 'carol@example.com',
                'role' => 'user',
                'job_title' => 'Sales Representative',
                'team' => 'Sales',
            ],
            [
                'name' => 'David Wilson',
                'email' => 'david@example.com',
                'role' => 'admin',
                'job_title' => 'IT Administrator',
                'team' => 'IT',
            ],
            [
                'name' => 'Emma Brown',
                'email' => 'emma@example.com',
                'role' => 'editor',
                'job_title' => 'UX Designer',
                'team' => 'Design',
            ],
            [
                'name' => 'Frank Miller',
                'email' => 'frank@example.com',
                'role' => 'user',
                'job_title' => 'Customer Support',
                'team' => 'Support',
            ],
            [
                'name' => 'Grace Lee',
                'email' => 'grace@example.com',
                'role' => 'manager',
                'job_title' => 'Operations Manager',
                'team' => 'Operations',
            ],
            [
                'name' => 'Henry Taylor',
                'email' => 'henry@example.com',
                'role' => 'editor',
                'job_title' => 'Technical Writer',
                'team' => 'Documentation',
            ],
            [
                'name' => 'Ivy Martinez',
                'email' => 'ivy@example.com',
                'role' => 'user',
                'job_title' => 'Data Analyst',
                'team' => 'Analytics',
            ],
            [
                'name' => 'Jack Anderson',
                'email' => 'jack@example.com',
                'role' => 'admin',
                'job_title' => 'Security Engineer',
                'team' => 'Security',
            ],
        ];

        foreach ($demoUsers as $demoUser) {
            $user = User::create([
                'name' => $demoUser['name'],
                'email' => $demoUser['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'is_active' => true,
                'locale' => 'en',
                'timezone' => 'America/New_York',
                'theme' => 'dark',
                'email_notifications' => true,
                'job_title' => $demoUser['job_title'],
                'company' => 'Demo Company',
                'bio' => "{$demoUser['job_title']} at Demo Company",
                'phone' => '+1 (555) ' . rand(100, 999) . '-' . rand(1000, 9999),
            ]);
            $user->assignRole($demoUser['role']);
        }

        // Create users with unverified emails (for testing email verification)
        $unverifiedUser = User::create([
            'name' => 'Unverified User',
            'email' => 'unverified@example.com',
            'email_verified_at' => null,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'locale' => 'en',
            'timezone' => 'UTC',
            'theme' => 'dark',
            'email_notifications' => true,
            'job_title' => 'Pending Verification',
            'company' => 'Enterprise Inc',
            'bio' => 'Email not verified yet',
        ]);
        $unverifiedUser->assignRole('user');

        // Create users with specific preferences
        $preferencesUser = User::create([
            'name' => 'Preferences User',
            'email' => 'preferences@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'locale' => 'es',
            'timezone' => 'Europe/Madrid',
            'theme' => 'light',
            'email_notifications' => false,
            'marketing_emails' => true,
            'preferences' => json_encode([
                'dashboard_layout' => 'compact',
                'notifications_enabled' => true,
                'sound_enabled' => false,
                'language' => 'es',
                'date_format' => 'DD/MM/YYYY',
            ]),
            'job_title' => 'Product Manager',
            'company' => 'Enterprise Inc',
            'bio' => 'User with custom preferences',
            'github_username' => 'prefs-user',
            'twitter_username' => '@prefsuser',
            'linkedin_username' => 'prefs-user',
        ]);
        $preferencesUser->assignRole('editor');

        // Create bulk users for testing (optional - comment out if not needed)
        if (env('APP_ENV') === 'local') {
            for ($i = 1; $i <= 50; $i++) {
                $user = User::create([
                    'name' => "Test User {$i}",
                    'email' => "testuser{$i}@example.com",
                    'email_verified_at' => $i % 2 == 0 ? now() : null,
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'is_active' => $i % 3 != 0,
                    'locale' => ['en', 'es', 'fr'][array_rand(['en', 'es', 'fr'])],
                    'timezone' => ['UTC', 'America/New_York', 'Europe/London', 'Asia/Tokyo'][array_rand(['UTC', 'America/New_York', 'Europe/London', 'Asia/Tokyo'])],
                    'theme' => ['dark', 'light'][array_rand(['dark', 'light'])],
                    'email_notifications' => (bool) rand(0, 1),
                    'job_title' => ['Developer', 'Designer', 'Manager', 'Analyst', 'Support'][array_rand(['Developer', 'Designer', 'Manager', 'Analyst', 'Support'])],
                    'company' => 'Test Company',
                    'bio' => 'This is a test user account for development purposes',
                    'phone' => '+1 (555) ' . rand(100, 999) . '-' . rand(1000, 9999),
                    'created_at' => now()->subDays(rand(1, 365)),
                ]);
                
                // Assign random role
                $roles = ['user', 'editor', 'manager'];
                $user->assignRole($roles[array_rand($roles)]);
            }
        }

        $this->command->info('Users seeded successfully!');
        $this->command->info('Default credentials: password / password');
        $this->command->info('Super Admin: superadmin@example.com');
        $this->command->info('Admin: admin@example.com');
        $this->command->info('Manager: manager@example.com');
        $this->command->info('Editor: editor@example.com');
        $this->command->info('Regular User: user@example.com');
    }
}