<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User:: create([
            'name'=> 'Dani',
            'email'=>'dani@gmail.com',
            'role'=>'pelanggan',
            'password'=> bcrypt(1)
        ]);

        User:: create([
            'name'=> 'Dazy',
            'email'=> 'dazy@gmail.com',
            'role'=> 'admin',
            'password' => bcrypt(1)
        ]);


        $kategori=Kategori::create([
            'name'=>'HP'
        ]);
        $kategori=Kategori::create([
            'name'=>'Aksesori'
        ]);
        $kategori=Kategori::create([
            'name'=>'Cassing'
        ]);

        Produk::create([
            'kategori_id'=>1,
            'name'=> 'Oppo F11 Pro',
            'harga'=>700000,
            'foto'=>'img/f11.jpg'
        ]);
        Produk::create([
            'kategori_id'=>1,
            'name'=> 'pova 4 pro',
            'harga'=>29000,
            'foto'=>'img/pva.jpg'
        ]);
        Produk::create([
            'kategori_id'=>2,   
            'name'=> 'Infinix hot 9',
            'harga'=>1899000,
            'foto'=>'img/hot9.jpg'
        ]);
        Produk::create([
            'kategori_id'=>3,
            'name'=> 'poco x3 pro',
            'harga'=>300000,
            'foto'=>'img/x3 pro.png'
        ]);
    }
}
