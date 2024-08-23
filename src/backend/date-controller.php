<?php
  include "connection.php";
  $current_year = $conn -> query('select year from dates');
  $current_month = $conn -> query('select month from dates');
  $current_day = $conn -> query('select day from dates');

  function datepick($min, $max)
  {
     for ($i = $min; $i <= $max; $i++)
       echo "<option value=$i>$i</option>";
   }

  function isLeap($year)
  {
    if ($year % 4 == 0 && $year % 100 || $year % 400 == 0)
      return true;
    return false;
   }

  $min_year = 1900;
  $max_year = 2024;

  $min_month = 1;
  $max_month = 12;

  $min_day = 1;
  $max_day;
  $j = 0;

  if ($_GET["member"] == "year")
    $current_year = (int) $_GET["value"];
  elseif ($_GET["member"] == "month")
    $current_month = (int) $_GET["value"];
  elseif ($_GET["member"] == "day") {
    echo "day";
    $current_day = (int) $_GET["value"];
  }
  else {
    $j++;
    echo $j + 1;
  }
  echo (int)$current_month + 3;
  // $query = 'UPDATE dates SET year=?, month=?, day=? WHERE id=1';
  // $conn -> execute_query($query, [$current_year, $current_month, $current_day]);
  // $conn -> close();

  switch ($current_month) {
    case 4:
  case 6:
  case 9:
  case 11:
    $max_day = 30;
    break;
  case 1:
  case 3:
  case 5:
  case 7:
  case 8:
  case 10:
  case 12:
    $max_day = 31;
    break;
  case 2:
    if (isLeap($current_year))
      $max_day = 29;
    else
      $max_day = 28;
    break;
  }
?>
