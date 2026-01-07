<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        Role::create(['name' => 'User', 'guard_name' => 'web']);

        User::factory()->create([
            'name' => 'Andri Sunardi',
            'email' => 'account@andrisunardi.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('Admin');

        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('User');
        });
    }
}
