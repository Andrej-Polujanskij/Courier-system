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
          <a href="./new_parcel.php">Nauja siuntą</a>
        </li>
        <li>
          <a href="./track.php">Sekti siuntą</a>
        </li>
        <li>
          <a href="./index.php">Namo</a>
        </li>
      </ul>
    </nav>
  </div>

  <div class="dashboard">
    <?php if(isset($_GET['parcel_id']) && $_GET['parcel_id'] != '' ){ ?>
    <div class="dashboard-user-complete">

      <h1>Siunta sekmingai issiusta</h1>
      <hr>

      <div class="complete-text">
        Zemiau jusu siuntos numeris su kurio galesite sekti siunta 
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