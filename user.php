<?php
include 'includes/header.php'
?>



<div class="aside">
  <?php
  include 'includes/back_btn.php'
  ?>

  <nav>
    <ul class="menu">
      <li>
        <a href="./new_parcel.php">Siųsti siuntą</a>
      </li>
      <li>
        <a href="./track.php">Sekti siuntą</a>
      </li>
      <li>
        <a href="./index.php">Pagrindinis</a>
      </li>
    </ul>
  </nav>
</div>

<div class="dashboard">
  <div class="dashboard-user-title">
    <h1>Klientų puslapis</h1>
    <hr>
    <div class="dashboard-user-title__text">
      <h1>Registruoti ir sekti siuntas dabar dar patogiau!</h1>
      <ul>
        <li>1: Pasirinkite Jus dominančią paslaugą</li>
        <li>2: Pirmyn!</li>
      </ul>
    </div>

    <div class="user-img">
      <?php
      include 'assets/img/city.svg'
      ?>
    </div>
  </div>




</div>

<?php
include 'includes/footer.php'
?>