<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence(6);
    $subtitle = $faker->sentence(8);
    return [
        'user_id' => 1,
        'category_id' => rand(1, 20),
        'title' => $title,
        'slug' => str_slug($title),
        'subtitle' => $subtitle,
        'excerpt' => $faker->text(200),
        'content' => $faker->text(600),
        'image_path' => $faker->imageUrl($width = 1200, $height = 450),
        'published_at' => Carbon::createFromTimeStamp($faker->dateTimeBetween($startDate = '-50 days', $endDate = 'now')->getTimeStamp())
    ];
});