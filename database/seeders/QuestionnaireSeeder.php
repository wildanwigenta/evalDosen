<?php

namespace Database\Seeders;
use App\Models\Questionnaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Questionnaire::insert([
            ['text' => 'Apakah dosen menjelaskan dengan jelas?', 'type' => 'scale', 'weight' => 1],
            ['text' => 'Apakah dosen menggunakan media pembelajaran yang sesuai?', 'type' => 'scale', 'weight' => 1],
            ['text' => 'Komentar atau saran lainnya', 'type' => 'text', 'weight' => 0],
        ]);
    }
}
