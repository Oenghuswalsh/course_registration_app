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

  $sql = "SELECT * FROM courses";

  $result = $mysqli->query($sql);

  $courses = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="./CSS/styles.css?<?php echo time(); ?>">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
    $(function() {
      var icons = {
        header: "ui-icon-circle-arrow-e",
        activeHeader: "ui-icon-circle-arrow-s"
      };

      $("#accordion").accordion({
        collapsible: true,
        active: false,
        heightStyle: "content",
        icons: icons
      });
    });
    $(function() {
      $("#speed").selectmenu();

      $("#files").selectmenu();

      $("#number")
        .selectmenu()
        .selectmenu("menuWidget")
        .addClass("overflow");

      $("#course_1st").selectmenu();
      $("#course_2st").selectmenu();
    });
  </script>
</head>

<body>

  <header>
    <h1>Profile</h1>
    <div>
      <?php if (isset($user)) : ?>
        <p>
          Hello
          <?= htmlspecialchars($user["name"]) ?><br>
          Email address:
          <?= htmlspecialchars($user["email"]) ?><br>
        </p>
      <?php else : ?>
        <p><a href="login.php" class="button">Log in</a> or <a href="signup.html" class="button">sign up</a></p>
      <?php endif; ?>
    </div>
    <div class="profileDetails actions">
      <a href="family_profile.php" class="button">Add Family/Visa</a>
      <a href="logout.php" class="button">Course Selection</a>
      <a href="logout.php" class="button">Log out</a>
    </div>
  </header>
  <div class="inner_profile_section">
    <div class="add_details profileDetails">
      <div id="accordion">
        <h3 class="data_entry">Main User</h3>
        <div class="expanded">
          <form action="process_profile.php" method="post" id="profile" novalidate>
            <div>
              <label for="user_id">User id</label>
              <input type="text" id="user_id" name="user_id" value="<?= htmlspecialchars($user["user_id"]) ?>" />
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
            <button type="submit">Save</button>
          </form>
        </div>
        <h3 class="data_entry">Postal Address</h3>
        <div class="expanded">
          <form action="process_profile.php" method="post" id="profile" novalidate>
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
        <h3 class="data_entry">Family Members</h3>
        <div class="expanded">
          <form action="process_profile.php" method="post" id="profile" novalidate>
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
        <h3 class="data_entry">Residency Status</h3>
        <div class="expanded">
          <form action="process_profile.php" method="post" id="profile" novalidate>
            <div>
              <label for="visa_type">Visa Type</label>
              <input type="text" id="visa_type" name="visa_type" />
            </div>
            <div>
              <label for="nationality">Nationality</label>
              <input type="text" id="nationality" name="nationality" />
            </div>
          </form>
        </div>
        <h3 class="data_entry">Billing Address</h3>
        <div class="expanded">
          <form action="process_profile.php" method="post" id="profile" novalidate>
            <div>
              <label for="email">Email Address:</label>
              <p id="email"><?= htmlspecialchars($user["email"]) ?><br></p>
            </div>
            <div>
              <label for="billing_address">Use Postal address</label>
              <input type="checkbox" id="billing_address" name="billing_address" />
            </div>
            <button type="submit">Save</button>
          </form>
        </div>
        <h3 class="data_entry">Occupation/Business</h3>
        <div class="expanded">
          <form action="process_profile.php" method="post" id="profile" novalidate>
            <div>
              <label for="occupation">Occupation</label>
              <input type="text" id="occupation" name="occupation" />
            </div>
            <div>
              <label for="company">Company</label>
              <input type="text" id="company" name="company" />
            </div>
            <div>
              <label for="position">Position</label>
              <input type="text" id="position" name="position" />
            </div>
            <div>
              <label for="abn">ABN</label>
              <input type="text" id="abn" name="abn" />
            </div>
            <div>
              <label for="employment_city">City where you are employed</label>
              <input type="text" id="employment_city" name="employment_city" />
            </div>
            <div>
              <label for="employment_state">State where you are employed</label>
              <input type="text" id="employment_state" name="employment_state" />
            </div>
            <button type="submit">Save</button>
          </form>
        </div>
        <h3 class="data_entry">Course Selection</h3>
        <div class="expanded">
          <div class="course_selection">
            <form action="process_profile.php" method="post" id="profile" novalidate>
              <div>
                <fieldset>
                  <label for="course_1st">Select a course 1st preference</label>
                  <select name="course_1st" id="course_1st">
                    <option disabled selected>Please pick one</option>
                    <option>Digital Marketing</option>
                    <option>Environmental Sustainability</option>
                    <option>Medicine</option>
                    <option>Culinary Arts</option>
                    <option>Tourism and Hospitality</option>
                    <option>Renewable Energy Engineering</option>
                    <option>Marine Biology</option>
                    <option>Fashion Design</option>
                    <option>Aerospace Engineering</option>
                    <option>Global Business Strategy</option>
                </fieldset>
                </select>
              </div>
              <button type="submit">Save</button>
            </form>
            <div>
              <label for="course1id">course id:</label>
              <?php if (isset($user)) : ?>
                <? $SQL = "UPDATE profiles p JOIN courses c ON p.course_1st_choice = c.title SET p.course_id_1st_choice = c.course_id"; ?>
                <p id="course1id"><?= htmlspecialchars($profile["course_id_1st_choice"]) ?><br></p>
              <?php else : ?>
                <p>No course selected</p>
              <?php endif; ?>
            </div>
          </div>
          <form action="process_profile.php" method="post" id="profile" novalidate>
            <div>
              <fieldset>
                <label for="course_2st">Select a course 2st preference</label>
                <select name="course_2st" id="course_2st">
                  <option disabled selected>Please pick one</option>
                  <option>Digital Marketing</option>
                  <option>Environmental Sustainability</option>
                  <option>Medicine</option>
                  <option>Culinary Arts</option>
                  <option>Tourism and Hospitality</option>
                  <option>Renewable Energy Engineering</option>
                  <option>Marine Biology</option>
                  <option>Fashion Design</option>
                  <option>Aerospace Engineering</option>
                  <option>Global Business Strategy</option>
              </fieldset>
              </select>
            </div>
            <button type="submit">Save</button>
          </form>
        </div>
      </div>
    </div>

    <div class="profile_details">
      <h2>Profile Details</h2>
      <?php if (isset($profile)) : ?>
        <p class="profile_data">Firstname: <?= htmlspecialchars($profile["firstname"]) ?></p>
        <p class="profile_data">Lastname: <?= htmlspecialchars($profile["lastname"]) ?></p>
        <p class="profile_data">Date of Birth: <?= htmlspecialchars($profile["date_of_birth"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($profile["street_number"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($profile["street_name"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($profile["suburb"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($profile["city"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($profile["state"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($profile["country"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($profile["spouse_name"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($profile["number_of_dependents"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($profile["course_1st_choice"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($profile["course_2nd_choice"]) ?></p>
      <?php else : ?>
        <p class="profile_data">No profile details available</p>
      <?php endif; ?>
      <?php if (isset($fprofile)) : ?>
        <h2>Profile Details</h2>
        <p class="profile_data"><?= htmlspecialchars($fprofile["visa_type"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($fprofile["nationality"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($fprofile["street_number"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($fprofile["street_name"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($fprofile["suburb"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($fprofile["city"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($fprofile["state"]) ?></p>
        <p class="profile_data"><?= htmlspecialchars($fprofile["country"]) ?></p>
      <?php else : ?>
        <p class="profile_data">No family profile details available</p>
      <?php endif; ?>
    </div>
  </div>

</body>

</html>