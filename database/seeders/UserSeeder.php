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
            'nama' => 'Hoard Situman',
            'nrp' => 'D11230120',
            'angkatan' => '2023',
            'jurusan' => 'Bussiness Accounting',
            'email' => 'hoard@staff.vg.ac.id',
            'password' => 'hoard123',
            'jeniskelamin' => 'Laki-laki',
            'no_hp' => '08154567890',
            'id_line' => 'hoardS.',
            'role' => 'admin'
        ]);
        User::create([
            'nama' => 'Caroline Hartanto',
            'nrp' => 'H11240112',
            'angkatan' => '2024',
            'jurusan' => 'Strategic Comunications',
            'email' => 'carl@event.vg.ac.id',
            'password' => '12345678',
            'jeniskelamin' => 'Perempuan',
            'no_hp' => '081234568212',
            'id_line' => 'carl.12',
            'role' => 'peserta'
        ]);
        User::create([
            'nama' => 'Aurelia',
            'nrp' => 'C14230200',
            'angkatan' => '2023',
            'jurusan' => 'Informatika',
            'email' => 'aurel.1a@member.vg.ac.id',
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
            'email' => 'bds@member.vg.ac.id',
            'password' => 'budikece123',
            'jeniskelamin' => 'Laki-laki',
            'no_hp' => '08234567890',
            'id_line' => 'budi123',
            'role' => 'peserta'
        ]);
    }
}
