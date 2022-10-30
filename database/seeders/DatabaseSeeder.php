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
            'name' => 'Admin',
            'nip' => '00000000',
            'username' => 'admin123',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'jabatan' => 'Widya Iswara',
            'golongan' => 'IV/a',
            'status_id' => 1,
            'level' => 'Admin',
            'phone' => '085465258965'
        ]);

        Kegiatan::create([
            'kode_kegiatan' => 'PKP',
            'nama_kegiatan' => 'Pelatihan Kepemimpinan'
        ]);

        Kegiatan::create([
            'kode_kegiatan' => 'PKA',
            'nama_kegiatan' => 'Pelatihan Keanggotaan'
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
