<?php
function getDBConn() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Faker";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
function checkDatabase() {
    $conn = new mysqli('localhost', 'root', '');
    $conn->query("CREATE DATABASE IF NOT EXISTS Faker");
    $conn->close();

    $conn = getDBConn();
    $conn->query("CREATE TABLE IF NOT EXISTS offices (
        id INT PRIMARY KEY,
        name VARCHAR(100),
        contactnum VARCHAR(50),
        email VARCHAR(100),
        address TEXT,
        city VARCHAR(100),
        country VARCHAR(50),
        postal VARCHAR(20)
    )");
    
    $conn->query("CREATE TABLE IF NOT EXISTS employees (
        id INT PRIMARY KEY,
        lastname VARCHAR(100),
        firstname VARCHAR(100),
        office_id INT,
        address TEXT,
        FOREIGN KEY (office_id) REFERENCES offices(id)
    )");
    
    $conn->query("CREATE TABLE IF NOT EXISTS transactions (
        id INT PRIMARY KEY,
        employee_id INT,
        office_id INT,
        datelog DATETIME,
        action VARCHAR(100),
        remarks TEXT,
        documentcode VARCHAR(50),
        FOREIGN KEY (employee_id) REFERENCES employees(id),
        FOREIGN KEY (office_id) REFERENCES offices(id)
    )");

    $conn->close();
}
function clearTable(){
    $conn = getDBConn();
    $conn->query("DELETE FROM transactions");
    $conn->query("DELETE FROM employees");
    $conn->query("DELETE FROM offices");
}

function addOffice($x) {
    $offices = [];
    $faker = Faker\Factory::create('en_PH');
    for ($i = 1; $i <= $x; $i++) {
    $offices[] = [
        'id' => $i,
        'name' => $faker->company,
        'contactnum' => $faker->phoneNumber,
        'email' => $faker->companyEmail,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'country' => 'Philippines',
        'postal' => $faker->postcode
    ];
    $conn = getDBConn();
    $query = $conn->prepare("INSERT INTO offices (id, name, contactnum, email, address, city, country, postal) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute(array_values($offices[$i - 1]));
    }
    $conn=null;
    return $offices;
}
function addEmployee($x, $offices) {
    $employees = [];
    $faker = Faker\Factory::create('en_PH');
    for ($i = 1; $i <= $x; $i++) {
    $employees[] = [
        'id' => $i,
        'lastname' => $faker->lastName,
        'firstname' => $faker->firstName,
        'office_id' => $faker->randomElement(array_column($offices, 'id')),
        'address' => $faker->address
    ];
    $conn = getDBConn();
    $query = $conn->prepare("INSERT INTO employees (id, lastname, firstname, office_id, address) VALUES (?, ?, ?, ?, ?)");
    $query->execute(array_values($employees[$i - 1]));
    }
    $conn=null;
    return $employees;
}
function addTransaction($x, $offices, $employees) {
    $transactions = [];
    $faker = Faker\Factory::create('en_PH');
    for ($i = 1; $i <= $x; $i++) {
        $transactions[] = [
            'id' => $i,
            'employee_id' => $faker->randomElement(array_column($employees, 'id')),
            'office_id' => $faker->randomElement(array_column($offices, 'id')),
            'datelog' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'action' => $faker->word,
            'remarks' => $faker->sentence,
            'documentcode' => strtoupper($faker->bothify('DOC-####-???'))
        ];
        $conn = getDBConn();
        $query = $conn->prepare("INSERT INTO transactions (id, employee_id, office_id, datelog, action, remarks, documentcode) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->execute(array_values($transactions[$i - 1]));
    }
    $conn->close();
}
?>