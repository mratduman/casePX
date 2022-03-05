<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Exam;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $exams;
    protected $articles;

    public function __construct()
    {
        // Fetch the Site Settings object
        $this->exams = Exam::query()->orderByDesc('id')->get();
        $this->articles = Article::query()->get();

        View::share('exams', $this->exams);
        View::share('articles', $this->articles);
    }
}
