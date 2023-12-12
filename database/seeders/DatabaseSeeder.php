<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@inspektorat.com',
            'password' => 'inspektorat!23',
        ]);

        Role::create(['name' => 'ADMIN']);
        Role::create(['name' => 'PEGAWAI']);

        $admin = User::find(1);
        // $user = User::find(2);
        $admin->assignRole('ADMIN');
        // $user->assignRole('PEGAWAI');
    }
}
