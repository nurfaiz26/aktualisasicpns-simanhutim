<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::where('username', 'Admin')->exists()) {
            # code...
            return;
        } else {
            $nama = 'Admin SIMANHUTIM';

            User::create([
                'username' => 'Admin',
                'name' => $nama,
                'email' => 'admin@simanhutim.com',
                'password' => bcrypt('123'),
                'user_data_id' => UserData::create([
                    'kota_id' => 1,
                    'nama' => $nama,
                    'no_telepon' => '0813344556678',
                    'no_ktp' => '3578089999990001',
                    'alamat' => 'Jl. Ngagel',
                ])->id,
            ]);
        }
    }
}
