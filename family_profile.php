<?php

session_start();

if (isset($_SESSION["proflie_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM profiles
            WHERE user_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Family Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
</head>

<body>
    <h1>Profile Details</h1>

    <?php if (isset($profiles)) : ?>

        <p>
            Hello
            <?= htmlspecialchars($profiles["firstname"]) ?><br>
            Email address: <br>
            <?= htmlspecialchars($profiles["firstname"]) ?>
        </p>


    <?php else : ?>

        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>

    <?php endif; ?>


    <form action="family_profile.php" method="post" id="family_profile" novalidate>
        <div>
            <label for="visa_type">Visa Type</label>
            <input type="text" id="visa_type" name="visa_type" />
        </div>

        <div>
            <label for="nationality">Nationality</label>
            <input type="text" id="nationality" name="nationality" />
        </div>

        <div>
            <label for="street_number">Street Number</label>
            <input type="number" id="street_number" name="street_number" />
        </div>

        <div>
            <label for="street_name">Street</label>
            <input type="text" id="street_name" name="street_name" />
        </div>

        <div>
            <label for="suburb">Suburb</label>
            <input type="text" id="suburb" name="suburb" />
        </div>

        <div>
            <label for="city">City</label>
            <input type="text" id="city" name="city" />
        </div>

        <div>
            <label for="state">State</label>
            <input type="text" id="state" name="state" />
        </div>

        <div>
            <label for="country">Country</label>
            <input type="text" id="country" name="country" />
        </div>

        <button type="submit">Save</button>
    </form>
    <button type="submit"><a href="logout.php">Log out</a></button>
</body>

</html>