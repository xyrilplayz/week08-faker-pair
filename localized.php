<?php
require ('vendor/autoload.php');

$faker = Faker\Factory::create('en_PH');


for ($i=0;$i<=5;$i++){
    $name = $faker->name;
    $email = $faker ->email;
    $phonenumber =$faker->mobileNumber();
    $address = $faker->province;
    $city = $faker->city;
    $bday = $faker-> dateTimeThisCentury->format("Y-m-d");
    $job_Title = $faker->jobTitle;

    echo $name,"\n".$email,"\n". $phonenumber,"\n". $address, ", ". $city, "\n". $bday, "\n". $job_Title ."\n";
}
?>

