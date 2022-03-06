<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProtfolioItem;
use Faker\Generator as Faker;

$factory->define(ProtfolioItem::class, function (Faker $faker) {

    return [
        'project_title' => $faker->word,
        'proftfolio_category_id' => $faker->randomDigitNotNull,
        'about_project' => $faker->text,
        'detail_description' => $faker->text,
        'project_date' => $faker->word,
        'client' => $faker->word,
        'project_location' => $faker->word,
        'video_demo_link' => $faker->word,
        'video_description' => $faker->word,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
