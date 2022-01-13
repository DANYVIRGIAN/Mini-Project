<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\datawarga;
use App\Models\datarumah;

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

        // User::create([
        //     'username' => 'aa',
        //     'email' => 'a@gmail.com',
        //     'password' => bcrypt('admin'),
        //     'level' => 'admin'
        // ]);

        User::create([
            'username' => 'Pak RT',
            'email' => 'rt@gmail.com',
            'password' => bcrypt('admin'),
            'level' => 'superadmin'
        ]);

        // datawarga::create([
        //     'nama' => 'Aa',
        //     'Foto_KTP' => '',
        //     'alamat' => 'aaa',
        //     'tanggal_lahir' => '1999-01-29',
        //     'email' => 'a@gmail.com',
        //     'jeniskelamin' => 'laki',
        //     'status' => 'single',
        //     'status_warga' => 'warga'
        // ]);

        // datarumah::create([
        //     'nomor' => '12',
        //     'alamat' => 'aaa',
        //     'id_pemilik' => '8',
        //     'id_penghuni' => '9',
        // ]);
    }
}
