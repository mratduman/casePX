<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SocialNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_networks')->insert([
            'title' => 'Facebook',
            'icon' => 'fa fa-facebook',
            'order' => 2,
            'url' => 'https://www.facebook.com/mratduman/',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('social_networks')->insert([
            'title' => 'GitHub',
            'icon' => 'fa fa-github',
            'order' => 1,
            'url' => 'https://github.com/mratduman',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('social_networks')->insert([
            'title' => 'Instagram',
            'icon' => 'fa fa-instagram',
            'order' => 3,
            'url' => 'https://www.instagram.com/mratduman/',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
