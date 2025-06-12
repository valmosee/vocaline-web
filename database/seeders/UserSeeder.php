<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Aurelia',
            'nrp' => 'C14230200',
            'angkatan' => '2023',
            'jurusan' => 'Informatika',
            'email' => 'aurel.1a@gmail.com',
            'password' => 'aurelia123',
            'jeniskelamin' => 'Perempuan',
            'no_hp' => '08123456789',
            'id_line' => 'aurelia123',
            'role' => 'peserta'
        ]);
        User::create([
            'nama' => 'Budi Santoso',
            'nrp' => 'H11230120',
            'angkatan' => '2023',
            'jurusan' => 'Desain Komiunikasi Visual',
            'email' => 'bds@gmail.com',
            'password' => 'budikece123',
            'jeniskelamin' => 'Laki-laki',
            'no_hp' => '08234567890',
            'id_line' => 'budi123',
            'role' => 'peserta'
        ]);
    }
}
