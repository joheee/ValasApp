<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin 1',
            'role' => 'admin',
            'email' => 'admin@valas.id',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Super Admin 1',
            'role' => 'super admin',
            'email' => 'super_admin@valas.id',
            'password' => Hash::make('super_admin'),
            'created_at' => Carbon::now(),
        ]);
    }
}
