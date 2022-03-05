<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = Question::query()->select('id','exam_id')->get();

        foreach ($questions as $question) {

            for ($i=1; $i<6; $i++) {

                $isCorrect = 0;

                if ($i==3)
                    $isCorrect = 1;

                DB::table('options')->insert([
                    'exam_id' => $question->exam_id,
                    'question_id' => $question->id,
                    'option' => Str::random(5),
                    'is_correct' => $isCorrect,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
