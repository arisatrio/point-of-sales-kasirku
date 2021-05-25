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
        // \App\Models\User::factory(10)->create();
        DB::table('produks')->insert([
            'user_id' => 1,
            'kode_produk' => 001,
            'nama_produk' => Str::random(10),
            'kategori' => "Lainnya",
            'harga' => '20.000',
            'deskripsi' => Str::random(20),
            'foto'  => "default.jpg",
            'stok'  => 100
        ]);
    }
}
