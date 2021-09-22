<?php
include 'includes/header.php'
?>

<body>



  <div class="aside">
    <?php
    include 'includes/back_btn.php'
    ?>

    <nav>
      <ul class="menu">
        <li>
          <a href="./new_parcel.php">Nauja siunta</a>
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
    <?php if(isset($_GET['parcel_id']) && $_GET['parcel_id'] != '' ){ ?>
    <div class="dashboard-user-complete">

      <h1>Siunta sėkmingai išsiųsta</h1>
      <hr>

      <div class="complete-text">
        Žemiau, Jūsų siuntos numeris, su kuriuo galėsite sekti siuntą 
      </div>

      <div class="complete-number">
      <?php
        echo $_GET['parcel_id']
        ?>
      </div>

      <div class="track-img">
			<img src="./assets/img/complete.png" alt="track">
		</div>

    </div>
    <?php }else{ ?>
      <div class="dashboard-user-complete">
      <h1>Ivyko klaida</h1>
      <hr>

      <div class="complete-text">
        Pasirinkyte norima paslauga kairiau 
      </div>

      </div>
      <?php } ?>
  </div>




  </div>

  <?php
  include 'includes/footer.php'
  ?>