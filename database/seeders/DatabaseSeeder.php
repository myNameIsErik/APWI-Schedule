<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\status;
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
        User::create([
            'name' => 'Wahyu',
            'nip' => '00112233',
            'username' => 'wahyu00',
            'email' => 'wahyu00@gmail.com',
            'password' => bcrypt('wahyu123'),
            'status_id' => 1,
            'level' => 'admin',
            'phone' => '085465258965'
        ]);

        User::create([
            'name' => 'Kinanti',
            'nip' => '00112244',
            'username' => 'kinanti11',
            'email' => 'kinanti11@gmail.com',
            'password' => bcrypt('kinan123'),
            'status_id' => 1,
            'level' => 'user',
            'phone' => '085465258967'
        ]);

        Kegiatan::create([
            'kode_kegiatan' => 'PKP',
            'nama_kegiatan' => 'Pelatihan Kepemimpinan',
            'jp' => '6'
        ]);

        Kegiatan::create([
            'kode_kegiatan' => 'PKA',
            'nama_kegiatan' => 'Pelatihan Keanggotaan',
            'jp' => '3'
        ]);

        Status::create([
            'status_name' => 'Tersedia'
        ]);

        Status::create([
            'status_name' => 'Perjalanan Dinas'
        ]);

        Status::create([
            'status_name' => 'Maks JP'
        ]);
    }
}
