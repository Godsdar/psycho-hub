<?php
  try {
    include "connection.php";

    if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["_text"])) {
      $first_name = $_POST["first_name"];
      $last_name  = $_POST["last_name"];
      $avatar     = 'src/assets/images/default-avatar.png';
      $text       = $_POST["_text"];
      $date       = $_POST["year"] . "-" . $_POST["month"] . "-" . $_POST["day"];

      $query = "INSERT INTO comments (first_name, last_name, avatar, _text, _date) VALUES (:first_name, :last_name, :avatar, :text, :date)";
      $prep = $conn -> prepare($query);

      $prep -> bindParam(':first_name', $first_name);
      $prep -> bindParam(':last_name', $last_name);
      $prep -> bindParam(':avatar', $avatar);
      $prep -> bindParam(':text', $text);
      $prep -> bindParam(':date', $date);

      $prep -> execute();
      $prep = null;
      $conn = null;
    }
  }
  catch (PDOException $e) {
    echo "Подключиться не удалось";
  }
?>
