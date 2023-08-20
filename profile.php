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
  <title>Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
</head>

<body>
  <h1>Profile Details</h1>

  <?php if (isset($user)) : ?>

    <p>
      Hello
      <?= htmlspecialchars($user["name"]) ?><br>
      Email address: <br>
      <?= htmlspecialchars($user["email"]) ?>
    </p>


  <?php else : ?>

    <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>

  <?php endif; ?>


  <form action="process_profile.php" method="post" id="profile" novalidate>
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
  <button type="submit"><a href="family_profile.php">Add Family/Visa</a></button>
  <button type="submit"><a href="logout.php">Course Selection</a></button>
  <button type="submit"><a href="logout.php">Log out</a></button>
</body>

</html>