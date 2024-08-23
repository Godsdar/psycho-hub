<?php
  try {
    include "connection.php";

    $query = "SELECT * FROM comments";
    $run = $conn -> query($query);
    $num_query = "SELECT COUNT(*) FROM comments";
    $num_run   = $conn -> query($num_query);
    $num = $num_run -> fetchColumn();

    for ($i = 0; $i < $num; $i++) {
      $row = $run -> fetch(PDO::FETCH_ASSOC);
      $id = $row["id"];
      $name = $row["first_name"];
      $last_name = $row["last_name"];
      $avatar = $row["avatar"];
      $text = $row["_text"];
      $date = $row["_date"];

      echo "<div class='comment col-12' id=$id>
        <div class='comment-wrapper'>
          <i class='comment-delete-button fa-solid fa-trash-can'></i>
          <div class='comment-author-info'>
            <div class='comment-author-photo'><img src=$avatar alt='' class='comment-photo'></div>
            <div class='comment-author-name'>$name $last_name</div>
          </div>
          <p class='comment-text'>$text</p>
          <span class='comment-date'>$date</span>
        </div>
      </div>";
    }
  }
  catch (PDOException $e) {
    echo "Ну всё";
  }
?>