<?php

  /*
    Demonstrates How to create a database, create a table, and insert records.
  */
  // Creates connecion for mySQL. Stored in variable $mysqli
  $mysqli = new mysqli("localhost", "root", "Secret");

  // If not connected, then produce error message
  if (!$mysqli)
  {
    die("Could not connect: " .mysqli_error($mysqli));
  }
  // Otherwise, print out message to let user know database is connected
  echo "Connected successfully to mySQL.<BR>";

  // Checks to see if the database was successfully created
  if ($mysqli->query("CREATE DATABASE Cars") === TRUE)
  {
    // If successful, let user know.
    echo "<p>Database Cars created</p>";
  }
  // Otherwise, print error message
  else
  {
    echo "Error creating Cars database" .mysqli_error($mysqli)."<br>";
  }

  // Selects a mySQL database, in this case, "Cars"
  $mysqli->select_db("Cars");
  // Prints success message to the user
  Echo "Selected the Cars database";

  // Creates a variable to hold an sql statement thats create a table called "INVENTORY"
  $query = "CREATE TABLE inventory
   (VIN varchar(17) PRIMARY KEY, YEAR INT, Make varchar(50), Model varchar(100),
    TRIM varchar(50), EXT_COLOR varchar(50), INT_COLOR varchar(50),
    ASKING_PRICE DECIMAL(10, 2), SALE_PRICE DECIMAL(10, 2), PURCHASE_PRICE DECIMAL(10, 2),
     PURCHASE_DATE DATE, SALE_DATE DATE)";

  // Tests to see if the query for $query was successfully created
  if ($mysqli->query($query) === True)
  {
    // If so, print success message
    echo "Database table 'INVENTORY' created</p>";
  }
  else
  {
    // Otherwise, print error message
    echo "<p>Error:</p>".mysqli_error($mysqli);
  }

  // Dates are stored in 'YYYY-MM-DD' format
  /*
    Updates $query variable to to a new sql statement. It tells the varibale
    to use the INSERT statement to insert a new row into the table, inventory
  */
  $query = "INSERT INTO `Cars`.`inventory`
  (`VIN`, `YEAR`, `Make`, `Model`, `TRIM`, `EXT_COLOR`, `INT_COLOR`, `ASKING_PRICE`,
    `SALE_PRICE`, `PURCHASE_PRICE`, `MILEAGE`, `TRANSMISSION`, `PURCHASE_DATE`,
    `SALE_DATE`)
    VALUES
    ('5FNYF4H91CB054036', '2012', 'Honda', 'Pilot', 'Touring', 'White Diamond Pearl',
      'Leather', '37807', NULL, '34250', '7076', 'Automatic', '2012-11-08', NULL);";

  // Tests to see if SQL statement was successful
  if ($mysqli->query($query) === TRUE)
  {
    // If successful, print out success message
    echo "<p>Honda Pilot inserted into inventory table.</p>";
  }

  else
  {
    // Otherwise, print error message
    echo "<p>Error inserting Honda Pilot:</p>".mysqli_error($mysqli);
    echo "<p>************</p>";
    echo "$query";
    echo "<p>************</p>";
  }

  // Does the same thing as previous code block, but for a different car.
  $query = "INSERT INTO `Cars`.`inventory` (`VIN`, `YEAR`, `Make`, `Model`,
            `TRIM`, `EXT_COLOR`, `INT_COLOR`, `ASKING_PRICE`, `SALE_PRICE`,
            `PURCHASE_PRICE`, `MILEAGE`, `TRANSMISSION`, `PURCHASE_DATE`, `SALE_DATE`)
  VALUES
  ('LAKSDFJ234LASKRF2', '2009', 'Dodge', 'Durango' ,'SLT', 'Silver', 'Black', '2700', NULL,
  '2000', '144000', '4WD Automatic', '2012-12-05', NULL);";

  if ($mysqli->query($query) === TRUE)
  {
    echo "<p>Dodge Durango inserted into inventory table</p>";
  }
  else
  {
    echo "<p>Error Inserting Dodge:</p>".mysqli_error($mysqli);
    echo "<p>************</p>";
    echo "$query";
    echo "<p>************</p>";
  }
  // Close connection to mySQL
  $mysqli->close();
 ?>
