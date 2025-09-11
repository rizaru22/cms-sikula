<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //     $this->call([
        //         UserSeeder::class,
        //     ]);
        
        Profile::create([
            'name' => 'SMK Negeri 1 Karang Baru',
            'short_name' => 'SMKN1 Karang Baru',
            'email' => 'smkn1karangbaru@gmail.com',
            'phone' => '0641-12345678',
            'address' => 'Jalan Pendidikan No. 1, Karang Baru, Aceh Tamiang',
            'welcome_message' => 'Selamat datang di SMK Negeri 1 Karang Baru. Kami berkomitmen untuk memberikan pendidikan terbaik bagi generasi masa depan.',
            'history' => 'SMK Negeri 1 Karang Baru didirikan pada tahun 2000 dengan tujuan untuk menyediakan pendidikan vokasi yang berkualitas di wilayah Aceh Tamiang. Sejak awal berdirinya, sekolah ini telah berkembang pesat dan menjadi salah satu institusi pendidikan terkemuka di daerah ini.',
            'vision' => 'Menjadi sekolah menengah kejuruan unggulan yang menghasilkan lulusan yang kompeten, berkarakter, dan siap bersaing di tingkat nasional maupun internasional.',
            'mission' => '1. Menyediakan kurikulum yang relevan dengan kebutuhan industri dan perkembangan teknologi.<br>2. Meningkatkan kualitas tenaga pendidik melalui pelatihan dan pengembangan profesional.<br>3. Membangun kemitraan dengan dunia usaha dan industri untuk mendukung program magang dan penempatan kerja bagi siswa.<br>4. Mengembangkan karakter siswa melalui kegiatan ekstrakurikuler dan pembinaan kepribadian.',
        ]);

    }

     
}
