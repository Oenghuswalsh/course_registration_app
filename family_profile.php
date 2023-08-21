<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
    WHERE user_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    $sql = "SELECT * FROM profiles p
            WHERE p.user_id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $profile = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Family Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./CSS/styles.css">
</head>

<body>
    <h1>Profile Details</h1>

    <div class="profile_section">
        <div class="profileDetails">
            <?php if (isset($profile)) : ?>
                <p>
                    Hello
                    <?= htmlspecialchars($profile["firstname"]) ?>
                </p>
            <?php else : ?>
                <p>No profile data available <a href="profile.php">Edit profile</a></p>

            <?php endif; ?>
            <form action="process_family_profile.php" method="post" id="family_profile" novalidate>
                <div>
                    <input type="hidden" id="user_id" name="user_id" value="<?= htmlspecialchars($user["user_id"]) ?>" />
                </div>
                <div>
                    <input type="hidden" id="profile_id" name="profile_id" value="<?= htmlspecialchars($profile["profile_id"]) ?>" />
                </div>
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
        </div>
        <div class="profileDetails actions">
            <button type="submit"><a href="logout.php">Log out</a></button>
            <button type="submit"><a href="profile.php">Profile page</a></button>
        </div>
    </div>
</body>

</html>