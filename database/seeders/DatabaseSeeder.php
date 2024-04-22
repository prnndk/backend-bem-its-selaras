<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\RolesType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'bem@its.ac.id',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role' => RolesType::ADMIN
            ]);
            $this->call([
                KemenkoanSeeder::class
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }
}
