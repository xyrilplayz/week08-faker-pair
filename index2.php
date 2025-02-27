<?php
include 'function2.php';
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH');

checkDatabase();
clearTable();
$offices = addOffice(50);
$employees = addEmployee(200, $offices);
addTransaction(500, $offices, $employees);
echo "Data replaced successfully.";