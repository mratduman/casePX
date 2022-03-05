<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $validated = $request->validate([
            'search' => 'required'
        ]);

        $searchExams = Exam::query()
            ->where('title','like','%'.$request->search.'%')
            ->get();

        return view('search', compact('searchExams'));
    }
}
