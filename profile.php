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

  $sql = "SELECT * FROM family_profile f
  WHERE f.user_id = {$_SESSION["user_id"]}";

  $result = $mysqli->query($sql);

  $fprofile = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./CSS/styles.css">
</head>

<body>
  <h1>Profile</h1>
  <div class="profile_section">
    <div class="add_details profileDetails">
      <h2>Edit Profile Details</h2>
      <?php if (isset($user)) : ?>
        <p>
          Hello
          <?= htmlspecialchars($user["name"]) ?><br>
          Email address: <br>
          <?= htmlspecialchars($user["email"]) ?><br>
        </p>
      <?php else : ?>
        <p><a href="login.php" class="button">Log in</a> or <a href="signup.html" class="button">sign up</a></p>
      <?php endif; ?>
      <form action="process_profile.php" method="post" id="profile" novalidate>
        <div>
          <input type="hidden" id="user_id" name="user_id" value="<?= htmlspecialchars($user["user_id"]) ?>" />
        </div>
        <div>
          <label for="firstname">First Name</label>
          <input type="text" id="firstname" name="firstname" />
        </div>
        <div>
          <label for="lastname">Last Name</label>
          <input type="text" id="lastname" name="lastname" />
        </div>
        <div>
          <label for="date_of_birth">Date of Birth</label>
          <input type="date" id="date_of_birth" name="date_of_birth" />
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
        <div>
          <label for="spouse_name">Spouse Name</label>
          <input type="text" id="spouse_name" name="spouse_name" />
        </div>
        <div>
          <label for="number_of_dependents">Number of Dependents</label>
          <input type="number" id="number_of_dependents" name="number_of_dependents" />
        </div>
        <button type="submit">Save</button>
      </form>
    </div>
    <div class="profileDetails actions">
      <a href="family_profile.php" class="button">Add Family/Visa</a>
      <a href="logout.php" class="button">Course Selection</a>
      <a href="logout.php" class="button">Log out</a>
    </div>
    <div class="profile_details  profileDetails">
      <h2>Profile Details</h2>
      <?php if (isset($profile)) : ?>
        <p><?= htmlspecialchars($profile["firstname"]) ?></p>
        <p><?= htmlspecialchars($profile["lastname"]) ?></p>
        <p><?= htmlspecialchars($profile["date_of_birth"]) ?></p>
        <p><?= htmlspecialchars($profile["street_number"]) ?></p>
        <p><?= htmlspecialchars($profile["street_name"]) ?></p>
        <p><?= htmlspecialchars($profile["suburb"]) ?></p>
        <p><?= htmlspecialchars($profile["city"]) ?></p>
        <p><?= htmlspecialchars($profile["state"]) ?></p>
        <p><?= htmlspecialchars($profile["country"]) ?></p>
        <p><?= htmlspecialchars($profile["spouse_name"]) ?></p>
        <p><?= htmlspecialchars($profile["number_of_dependents"]) ?></p>
        <p><?= htmlspecialchars($profile["course_1st_choice"]) ?></p>
        <p><?= htmlspecialchars($profile["course_2nd_choice"]) ?></p>

      <?php else : ?>

        <p>No profile details available</p>

      <?php endif; ?>
      <?php if (isset($fprofile)) : ?>
        <h2>Profile Details</h2>
        <p><?= htmlspecialchars($fprofile["visa_type"]) ?></p>
        <p><?= htmlspecialchars($fprofile["nationality"]) ?></p>
        <p><?= htmlspecialchars($fprofile["street_number"]) ?></p>
        <p><?= htmlspecialchars($fprofile["street_name"]) ?></p>
        <p><?= htmlspecialchars($fprofile["suburb"]) ?></p>
        <p><?= htmlspecialchars($fprofile["city"]) ?></p>
        <p><?= htmlspecialchars($fprofile["state"]) ?></p>
        <p><?= htmlspecialchars($fprofile["country"]) ?></p>

      <?php else : ?>

        <p>No family profile details available</p>

      <?php endif; ?>

    </div>
  </div>
</body>

</html>