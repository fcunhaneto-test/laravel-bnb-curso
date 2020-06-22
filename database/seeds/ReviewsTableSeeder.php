<?php

use Illuminate\Database\Seeder;
use \App\Bookable;
Use \App\Review;
class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::all()->each(function (Bookable $bookable) {
            $reviews = factory(Review::class, random_int(3, 5))->make();
            $bookable->reviews()->saveMany($reviews);
        });
    }
}
