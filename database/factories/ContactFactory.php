<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'team_id' => $faker->numberBetween(0, 100),
        'unsubscribed_status' => $faker->optional()->word,
        'first_name' => $faker->optional()->firstName,
        'last_name' => $faker->optional()->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->optional()->email,
        'sticky_phone_number_id' => $faker->optional()->numberBetween(0, 100),
        'twitter_id' => $faker->optional()->userName,
        'fb_messenger_id' => $faker->optional()->userName,
        'time_zone' => $faker->optional()->timezone
    ];
});
