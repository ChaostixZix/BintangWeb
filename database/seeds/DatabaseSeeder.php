<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        
        // Create schools
        $schools = [
            'SMPN 1 Padang',
            'SMPN 2 Padang',
            'SMPN 3 Padang',
            'SMPN 4 Padang',
            'SMPN 5 Padang',
            'MTs Thawalib Padang',
            'MTs Al-Azhar Padang',
            'SMP Islam Padang',
            'SMP Muhammadiyah Padang',
            'SMP Adabiah Padang'
        ];
        
        foreach ($schools as $school) {
            DB::table('sekolah')->insert([
                'nama_sekolah' => $school,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Create 122 random registrants
        for ($i = 0; $i < 122; $i++) {
            $nisn = $faker->unique()->numerify('##########');
            $username = 'user' . $faker->unique()->numberBetween(1000, 9999);
            
            // Create user
            DB::table('user')->insert([
                'nisn' => $nisn,
                'username' => $username,
                'password' => bcrypt('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            // Create pendaftar
            DB::table('pendaftar')->insert([
                'nisn' => $nisn,
                'nama_lengkap' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '-12 years'),
                'agama' => 'Islam',
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber,
                'email' => $faker->email,
                'sekolah' => $faker->randomElement($schools),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            // Create pendaftar_ppdb
            DB::table('pendaftar_ppdb')->insert([
                'nisn' => $nisn,
                'status' => $faker->randomElement(['pending', 'accepted', 'rejected']),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            // Create pendaftar_pendidikan
            DB::table('pendaftar_pendidikan')->insert([
                'nisn' => $nisn,
                'asal_sekolah' => $faker->randomElement($schools),
                'npsn_sekolah' => $faker->numerify('########'),
                'alamat_sekolah' => $faker->address,
                'no_ijazah' => $faker->numerify('DN-##/##-##/####/####'),
                'no_skhun' => $faker->numerify('SK-##/##-##/####/####'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            // Create pendaftar_kesehatan
            DB::table('pendaftar_kesehatan')->insert([
                'nisn' => $nisn,
                'tinggi_badan' => $faker->numberBetween(140, 180),
                'berat_badan' => $faker->numberBetween(35, 70),
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'riwayat_penyakit' => $faker->optional(0.3)->sentence(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            // Create pendaftar_ayah
            DB::table('pendaftar_ayah')->insert([
                'nisn' => $nisn,
                'nama' => $faker->name('male'),
                'pekerjaan' => $faker->jobTitle,
                'penghasilan' => $faker->randomElement(['< 1.000.000', '1.000.000 - 3.000.000', '3.000.000 - 5.000.000', '> 5.000.000']),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
                'no_hp' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            // Create pendaftar_ibu
            DB::table('pendaftar_ibu')->insert([
                'nisn' => $nisn,
                'nama' => $faker->name('female'),
                'pekerjaan' => $faker->jobTitle,
                'penghasilan' => $faker->randomElement(['< 1.000.000', '1.000.000 - 3.000.000', '3.000.000 - 5.000.000', '> 5.000.000']),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
                'no_hp' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            // Create pendaftar_wali (optional)
            if ($faker->boolean(30)) {
                DB::table('pendaftar_wali')->insert([
                    'nisn' => $nisn,
                    'nama' => $faker->name,
                    'pekerjaan' => $faker->jobTitle,
                    'penghasilan' => $faker->randomElement(['< 1.000.000', '1.000.000 - 3.000.000', '3.000.000 - 5.000.000', '> 5.000.000']),
                    'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
                    'no_hp' => $faker->phoneNumber,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}