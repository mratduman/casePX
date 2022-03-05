<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    public function start(Request $request) {
        $validated = $request->validate([
            'id' => 'required'
        ]);

        $exam = Exam::query()
            ->where('id',$request->id)
            ->first();

        $examId = $exam->id;

        if (!isset($exam->id))
            return 'Böyle bir sınav yok!';

        if (Session::has("$exam->id") and @Session::get("$exam->id")["completed"]==true) {
            return view('point',compact("examId"));
        }elseif (Session::has("$exam->id")) {
            return view('exam',compact("examId"));
        }

        $questions = Question::query()->where('exam_id',$exam->id)->get();

        $array = array(
            $exam->id => [
                'completed' => false,
                'point' => 0,
                'title' => $exam->title,
                'image_url' => $exam->image_url,
                'questions' => $questions->toArray()
            ]
        );

        $i = 0;
        foreach ($questions as $question) {
            $array[$exam->id]['questions'][$question->id]['options'] = Option::query()
                ->where('question_id',$question->id)
                ->get()
                ->toArray();

            $array[$exam->id]['questions'][$question->id]['isSelectedOptionCorrect'] = null;
            $i++;
        }

        \session($array);

        return view('exam',compact("examId"));
    }

    public function finish(Request $request) {
        $validated = $request->validate([
            'examId' => 'required'
        ]);
        $examId = $request->examId;

        $questionCount = Question::query()->where('exam_id',$request->examId)->count();
        $questionPoint = 100/$questionCount;
        $totalPoint = 0;

        $questions = Session::get("$request->examId")["questions"];
        foreach ($questions as $question) {
            /*
            if (isset($question["id"]) and $questions[$question["id"]]["isSelectedOptionCorrect"]==null)
                return false;
            */

            if (isset($question["id"]) and $questions[$question["id"]]["isSelectedOptionCorrect"]==1)
                $totalPoint = $totalPoint+$questionPoint;
        }

        $array = Session::get("$request->examId");

        $array["completed"] = true;
        $array["point"] = $totalPoint;



        session()->put("$examId", $array);
        session()->save();

        return view('point',compact("examId"));
    }

}
