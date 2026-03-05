<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Menu::insert([
            ['name'=>'Beranda','route'=>'home','order'=>1],
            ['name'=>'Profil Sekolah','route'=>'profile.school','order'=>2],
            ['name'=>'Berita','route'=>'news.list','order'=>3],
            ['name'=>'Prestasi','route'=>'achievement.list','order'=>4],
            ['name'=>'Produk','route'=>'product.list','order'=>5],
            ['name'=>'PPDB','route'=>'ppdb.info','order'=>6],
            ['name'=>'LMS','route'=>'lms','order'=>7],
        ]);
    }
}
