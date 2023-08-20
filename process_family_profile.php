<?php

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO family_profiles (visa_type, nationality, street_number, street_name, suburb, city, state, country,)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "ssssssss",
    $_POST["visa_type"],
    $_POST["nationality"],
    $_POST["street_number"],
    $_POST["street_name"],
    $_POST["suburb"],
    $_POST["city"],
    $_POST["state"],
    $_POST["country"],

);

if ($stmt->execute()) {

    header("Location: profile.php");
    exit;
}
