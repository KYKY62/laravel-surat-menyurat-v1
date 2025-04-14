<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role as SpatieRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        foreach (Role::cases() as $enumRole) {
            SpatieRole::firstOrCreate(['name' => $enumRole->status()]);
        }

        $admin = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'phone' => '082121212121',
            'password' => Hash::make('admin'),
            'role' => Role::ADMIN->status(),
        ]);
        $admin->assignRole(Role::ADMIN->status());
    }
}
