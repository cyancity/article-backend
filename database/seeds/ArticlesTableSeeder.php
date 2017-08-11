<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = factory(App\Article::class)->times(50)->make();
        App\Article::insert($articles->toArray());
    }
}
