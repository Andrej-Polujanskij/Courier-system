<?php
	include 'includes/header.php' 
?>
<body>
  <h1>complete page</h1>
  <div class="">
  Jusu siunots numeris
    <?php 
     echo $_GET['parcel_id']
    ?>
  </div>

  <div class="flex">
    <a href="./index.php">Namo</a>
    <a href="./track.php">Tikrinti siunta</a>
  </div>

  <?php
	include 'includes/footer.php' 
?>