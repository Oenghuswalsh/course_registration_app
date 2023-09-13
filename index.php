<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE user_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./CSS/styles.css?<?php echo time(); ?>">
</head>

<body>


    <header>
        <h1>Home</h1>
        <div class="profileDetails">
            <?php if (isset($user)) : ?>
                <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
                <a href="profile.php" class="button">Update Profile</a>
                <a href="logout.php" class="button">Log out</a>
            <?php else : ?>
                <a href="login.php" class="button">Log in</a>
                <a href="signup.html" class="button">sign up</a>
            <?php endif; ?>
        </div>
    </header>

</body>

</html>