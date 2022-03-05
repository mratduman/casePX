<?php namespace App\Providers;

use App\Models\Article;
use App\Models\Exam;
use App\Models\SocialNetwork;
use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view)
        {
            $view->with('exams', Exam::query()->orderByDesc('id')->get());
            $view->with('articles', Article::query()->get());
            $view->with('social_networks', SocialNetwork::query()->get());
        });
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
