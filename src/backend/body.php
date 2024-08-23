<body>
  <div class="container">
    <?php include "header.php"; ?>
    <section class="first-screen col-12">
      <div class="col">
        <h1 class="message-title">Расскажи нам свою историю</h1>
        <p class="message-subtitle">Наши специалисты окажут тебе всю нужную помощь. Также на нашем курсе ты найдешь друзей и обретешь поддержку</p>
      </div>
      <div class="col">
        <?php
          include "message.php";
          include "form.php";
        ?>
      </div>
      <section class="heart-section">
      <svg height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
        <g id="SVGRepo_bgCarrier" stroke-width="0" class="heart"/>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
        <g id="SVGRepo_iconCarrier"> <path style="fill:#FF6647;" d="M474.655,74.503C449.169,45.72,413.943,29.87,375.467,29.87c-30.225,0-58.5,12.299-81.767,35.566 c-15.522,15.523-28.33,35.26-37.699,57.931c-9.371-22.671-22.177-42.407-37.699-57.931c-23.267-23.267-51.542-35.566-81.767-35.566 c-38.477,0-73.702,15.851-99.188,44.634C13.612,101.305,0,137.911,0,174.936c0,44.458,13.452,88.335,39.981,130.418 c21.009,33.324,50.227,65.585,86.845,95.889c62.046,51.348,123.114,78.995,125.683,80.146c2.203,0.988,4.779,0.988,6.981,0 c2.57-1.151,63.637-28.798,125.683-80.146c36.618-30.304,65.836-62.565,86.845-95.889C498.548,263.271,512,219.394,512,174.936 C512,137.911,498.388,101.305,474.655,74.503z"/> <path style="fill:#e54848;" d="M160.959,401.243c-36.618-30.304-65.836-62.565-86.845-95.889 c-26.529-42.083-39.981-85.961-39.981-130.418c0-37.025,13.612-73.631,37.345-100.433c21.44-24.213,49.775-39.271,81.138-43.443 c-5.286-0.786-10.653-1.189-16.082-1.189c-38.477,0-73.702,15.851-99.188,44.634C13.612,101.305,0,137.911,0,174.936 c0,44.458,13.452,88.335,39.981,130.418c21.009,33.324,50.227,65.585,86.845,95.889c62.046,51.348,123.114,78.995,125.683,80.146 c2.203,0.988,4.779,0.988,6.981,0c0.689-0.308,5.586-2.524,13.577-6.588C251.254,463.709,206.371,438.825,160.959,401.243z"/> </g>
        </svg>
      </section>
    </section>
    <section class="row col-12 about-authors">
      <?php
        try {
          $conn = new PDO("mysql:host=localhost;dbname=mainDatabase", "root", "");
          $query = "SELECT * FROM doctors";
          $num_query = "SELECT COUNT(*) FROM doctors";
          $run = $conn -> query($query);
          $num = $conn -> query($num_query) -> fetchColumn();
          
          for ($i = 0; $i < $num; $i++) {
            $row = $run -> fetch(PDO::FETCH_ASSOC);
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $photo_link = $row["photo"];
            $resume = $row["resume"];

            echo "<div class=\"col-4 card\">
                    <h2 class=\"card-title\">$first_name $last_name</h2>
                    <p class=\"card-description\">$resume</p>
                    <span class=\"brand\">Ты не один</span>
                  </div>";
          }
        }
        catch (PDOException $e) {
          echo "Подключиться не удалось";
        }
      ?>
    </section>
    <section class="comments-section row">
      <?php include "comments.php"; ?>
    </section>
    <?php include "footer.php"; ?>
  </div>
</body>