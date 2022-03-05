<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $examNames = ['1. Sınav','2. Sınav','3. Sınav','4. Sınav','5. Sınav'];
        $i = 0;
        foreach ($examNames as $name) {
            $i++;
            DB::table('exams')->insert([
                'title' => $name,
                'slug' => Str::slug($name),
                'description' => $name.' açıklaması',
                'image_url' => 'img/'.$i.'.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
