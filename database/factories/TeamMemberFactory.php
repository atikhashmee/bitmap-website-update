<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TeamMember;
use Faker\Generator as Faker;

$factory->define(TeamMember::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'team_type_id' => $faker->randomDigitNotNull,
        'designation' => $faker->word,
        'description' => $faker->text,
        'email' => $faker->word,
        'status' => $faker->randomElement(['Active', 'On Leave', ' Left']),
        'is_private' => $faker->word,
        'linkedin' => $faker->word,
        'twitter' => $faker->word,
        'instagram' => $faker->word,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
