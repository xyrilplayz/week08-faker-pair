<?php
include 'function.php';
$profileData = createProfile(5);
$profiles = $profileData['profiles'];
$names = $profileData['names']; 
$books = createBook(15, $names);
$accounts = createAccount(10);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #table-container {
            margin: 30px auto;
            max-width: 80%;
            border: 10px solid black;
        }
        .table th, .table td {
            text-align: center;
        }
    </style>
</head>
<body class="">
    <div class="toggle-btn">
            <button class="btn btn-primary me-2" onclick="showTable('profile-table')">Show Profiles</button>
            <button class="btn btn-secondary me-2" onclick="showTable('book-table')">Show Books</button>
            <button class="btn btn-secondary me-2" onclick="showTable('account-table')">Show Accounts</button>
    </div>
    <div id="profile-table">
        <table class="table table-bordered table-hover w-200 p-3" id="table-container">
            <thead class="table-dark">
                <tr>
                    <td colspan="8">Profile</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>E-Mail</td>
                    <td>Phone Number</td>
                    <td>Address</td>
                    <td>City</td>
                    <td>Birthday</td>
                    <td>Job Title</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($profiles as $profile): ?>
                    <tr>
                        <td><?= ($profile['ID']) ?></td>
                        <td><?= ($profile['Name']) ?></td>
                        <td><?= ($profile['Email']) ?></td>
                        <td><?= ($profile['Phone Number']) ?></td>
                        <td><?= ($profile['Address']) ?></td>
                        <td><?= ($profile['City']) ?></td>
                        <td><?= ($profile['Birthday']) ?></td>
                        <td><?= ($profile['Job Title']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="account-table" style="display: none;">
        <table class="table table-bordered table-hover w-200 p-3" id="table-container">
            <thead class="table-dark">
                <tr>
                    <td colspan="7">Book</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>UID</td>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Username</td>
                    <td>Password</td>
                    <td>Account Created</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($accounts as $account): ?>
                    <tr>
                        <td><?= ($account['ID']) ?></td>
                        <td><?= ($account['UID']) ?></td>
                        <td><?= ($account['Full Name']) ?></td>
                        <td><?= ($account['Email']) ?></td>
                        <td><?= ($account['Username']) ?></td>
                        <td><?= ($account['Password']) ?></td>
                        <td><?= ($account['Account Creation']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="book-table" style="display: none;">
        <table class="table table-bordered table-hover w-200 p-3" id="table-container">
            <thead class="table-dark">
                <tr>
                    <td colspan="7">Book</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Author</td>
                    <td>Genre</td>
                    <td>Publication Year</td>
                    <td>ISBN</td>
                    <td>Summary</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($books as $book): ?>
                    <tr>
                        <td><?= ($book['ID']) ?></td>
                        <td><?= ($book['Title']) ?></td>
                        <td><?= ($book['Author']) ?></td>
                        <td><?= ($book['Genre']) ?></td>
                        <td><?= ($book['Publication Year']) ?></td>
                        <td><?= ($book['ISBN']) ?></td>
                        <td><?= ($book['Summary']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showTable(tableId) {
            document.getElementById("profile-table").style.display = "none";
            document.getElementById("book-table").style.display = "none";
            document.getElementById("account-table").style.display = "none";
            document.getElementById(tableId).style.display = "block";
        }
    </script>
</body>
</html>