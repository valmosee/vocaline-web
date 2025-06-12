<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class eventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'name'       => 'Spark 2025',
            'date'       => '2025-04-25',
            'location'   => 'Selasar P1 PCU',
            'address'    => 'Gedung P, Universitas Kristen Petra',
            'city'       => 'Surabaya',
            'jam_mulai'  => '10:00',
            'jam_selesai' => '12:00',
            'contact_person' => 'Jessica (012345678)',
            'image' => '',
            'total_penyanyi' => '4',
            'keterangan' => 'xxxxx',
            'status'     => 'onproses'
        ]);
    }
}
