<?php

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO profiles (user_id, firstname, lastname, date_of_birth, street_number, street_name, suburb, city, state, country, spouse_name, number_of_dependents)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssssssssssss",
    $_POST["user_id"],
    $_POST["firstname"],
    $_POST["lastname"],
    $_POST["date_of_birth"],
    $_POST["street_number"],
    $_POST["street_name"],
    $_POST["suburb"],
    $_POST["city"],
    $_POST["state"],
    $_POST["country"],
    $_POST["spouse_name"],
    $_POST["number_of_dependents"],

);

if ($stmt->execute()) {

    header("Location: profile.php");
    exit;
}
