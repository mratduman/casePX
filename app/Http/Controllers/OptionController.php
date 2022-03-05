<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OptionController extends Controller
{
    public function selected(Request $request) {
        $validated = $request->validate([
            'examId' => 'required',
            'questionId' => 'required',
            'optionId' => 'required'
        ]);

        $option = Option::query()->find($request->optionId);

        $array = Session::get("$request->examId");

        if ($option->is_correct==0) { // Yanlış yanıt
            $array['questions'][$request->questionId]["isSelectedOptionCorrect"] = 0;
            session()->put("$request->examId", $array);
            session()->save();
            return $array;
        }

        // Doğru yanıt
        $array['questions'][$request->questionId]["isSelectedOptionCorrect"] = 1;
        session()->put("$request->examId", $array);
        session()->save();
        return $array;
    }
}
