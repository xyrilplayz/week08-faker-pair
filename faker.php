<?php

require ('vendor/autoload.php');


$faker = Faker\Factory::create('en_PH');

for($i=0;$i<=10;$i++){
    $user = $faker-> unique()->safeEmail;
    $fullname = $faker->name;
    $Email = $faker-> email;
    $arr = explode("@", $Email);
    $username = $arr[0];
    $pass = $faker->sha256();
    $account = $faker->unixTime(new DateTime('-2 years'));

    echo $user,"\n". $fullname, "\n". $Email, "\n". $username, "\n".$pass, "\n". $account."\n";

}



?>