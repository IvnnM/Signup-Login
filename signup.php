<?php

  $mysqli = require __DIR__ . "/database.php";


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validation.js" defer></script>
  </head>
  <body>
    <h1>Signup</h1>

    <form action="signup-process.php" method="post" id="signup" novalidate>
      <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
      </div>

      <div>
        <label for="department">Department</label>
        <select id="department" name="department">
          <?php
          // Fetch department data from departmentstable
          $sql = "SELECT id, department_name FROM departmentstable";
          $result = $mysqli->query($sql);

          while ($row = $result->fetch_assoc()) {
              $departmentId = $row['id']; // Use 'id' from departmentstable as the department_id
              $departmentName = $row['department_name'];

              // Output each option with 'id' as the value
              echo "<option value='$departmentId'>$departmentName</option>";
          }
          ?>
        </select>
      </div>



      <div>
        <label for="email">GSuite email</label>
        <input type="email" id="email" name="email">
      </div>


      <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
      </div>

      <div>
        <label for="password_confirmation">Repeat password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
      </div>

      <button>Sign up</button>
    </form>


  </body>
</html>