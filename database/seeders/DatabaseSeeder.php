<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(PesananSeeder::class);
        DB::table('admins')->insert([
            'email' => "admin@email.com",
            'password' => bcrypt('12345678')
        ]);
    }
}
