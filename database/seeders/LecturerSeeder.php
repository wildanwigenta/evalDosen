<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lecturer;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Lecturer::insert([
        ['name' => 'Dr. Budi', 'nidn' => '1234567890'],
        ['name' => 'Prof. Ani', 'nidn' => '0987654321'],
    ]);
}

}
