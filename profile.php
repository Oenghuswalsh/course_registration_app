<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"
    />
  </head>

  <body>
    <h1>Profile Details</h1>

    <?php if (isset($user)) : ?>

    <p>
      Hello
      <?= htmlspecialchars($user["name"]) ?>
    </p>

    <form action="process_profile.php" method="post" id="profile" novalidate>
      <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" />
      </div>

      <div>
        <label for="email">email</label>
        <input type="email" id="email" name="email" />
      </div>

      <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" />
      </div>

      <div>
        <label for="password_confirmation">Repeat password</label>
        <input
          type="password"
          id="password_confirmation"
          name="password_confirmation"
        />
      </div>

      <button type="submit">Update Profile</button>
    </form>
  </body>
</html>
