<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@larablog.dev',
            'password' => bcrypt('admin'),
        ]);
        
        // création de 100 utilisateurs fictifs
        User::factory()->count(100)->create();
    }
}
