<?php
require_once 'vendor/autoload.php';
function createProfile ($x) {
    $profiles = array();
    $names = array();
    $faker = Faker\Factory::create('en_PH');

    for ($i = 0; $i <= $x; $i++) {
        $profile = array(
            'ID' => $i,
            'Name' => $faker->name,
            'Email' => $faker->email,
            'Phone Number' => $faker->phoneNumber,
            'Address' => $faker->province,
            'City' => $faker->city,
            'Birthday' => $faker-> dateTimeThisCentury()->format("m-d-Y"),
            'Job Title' => $faker->jobTitle
        );
        array_push($profiles, $profile);
        array_push($names, $profile['Name']);
    }
    return ['profiles' => $profiles, 'names' => $names];
}

function createBook ($x, $names) {
    $books = array();
    $faker = Faker\Factory::create('en_PH');
    for ($i = 0; $i <= $x; $i++) {
        $genre = array('Fiction', 'Mystery', 'Science Fiction', 'Fantasy', 'Romance', 'Thriller', 'Historical', 'Horror');
        $book = array(
            'ID' => $i,
            'Title' => $faker->unique()->text($maxNbChars = 100),
            'Author' => $faker->randomElement($names),
            'Genre' => $faker->randomElement($genre),
            'Publication Year' => $faker->numberBetween($min = 1900, $max=2024),
            'ISBN' => $faker->unique()->numberBetween($min = 0, $max = 10000000000000),
            'Summary' => $faker->unique()->text($maxNbChars = 500)
        );
        array_push($books, $book);
    }
    return $books;
}

function createAccount ($x) {
    $accounts = array();
    $faker = Faker\Factory::create('en_PH');
    for ($i = 0; $i <= $x; $i++) {
        $email = $faker-> email;
        $arr = explode("@", $email);

        $account = array(
            'ID' => $i,
            'UID' => $faker->unique()->safeEmail,
            'Full Name' => $faker->name,
            'Email' => $email,
            'Username' => $arr[0],
            'Password' => $faker->sha256(),
            'Account Creation' => $faker->unixTime(new DateTime('-2 years'))
        );
        array_push($accounts, $account);
    }
    return $accounts;
}
?>