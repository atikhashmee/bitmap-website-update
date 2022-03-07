<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProtfolioFaq;
use Faker\Generator as Faker;

$factory->define(ProtfolioFaq::class, function (Faker $faker) {

    return [
        'proftfolio_category_id' => $faker->randomDigitNotNull,
        'title' => $faker->word,
        'description' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
