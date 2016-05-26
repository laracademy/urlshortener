<?php

use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 10 links
        factory(\App\Link::class, 10)->create()->each(function($link) {
            if(rand(0,1) == 1)
            {
                $link->statistics()->save(factory(\App\Statistic::class)->create());
            }
        });
    }
}
