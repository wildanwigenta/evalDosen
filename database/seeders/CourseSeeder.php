<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Course::insert([
        ['name' => 'Pemrograman Web', 'code' => 'IF2201', 'semester' => 4, 'tahun_ajaran' => '2024/2025'],
        ['name' => 'Struktur Data', 'code' => 'IF2202', 'semester' => 2, 'tahun_ajaran' => '2024/2025'],
    ]);
}
}
