<!DOCTYPE html>

<html>
<head>
  <title>Fonky Sales Raport</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous"></script>
</head>
<body>

<?php

// Include required classes and functionalities
require("database.inc.php");
require("csv.inc.php");

// Run the CSV file initiation
$data = new CSVs( "orders.csv" );




?>

</body>
</html>
