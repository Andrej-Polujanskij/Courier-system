<?php
include 'includes/header.php';
include 'db_connect.php';

$qry = $conn->query("SELECT count(*) as total FROM parcels ");
$parcels = $qry->fetch_assoc();

$qry2 = $conn->query("SELECT count(*) as total FROM staff ");
$staff = $qry2->fetch_assoc();



?>

<div class="aside">
  <?php
  include 'includes/back_btn.php'
  ?>
  <nav>
    <ul class="menu">
      <li>
        <a href="./all_parcels.php">Visos siuntos</a>
      </li>
      <li>
        <a href="./staff.php">Kurjeriai</a>
      </li>
      <li>
        <a href="./index.php">Namo</a>
      </li>
    </ul>
  </nav>
</div>



<div class="dashboard">
  <div class="dashboard-user-complete">
    <h1>Kurjieriu puslapis</h1>
    <hr>

    <div class="admin-content">

      <div class="admin-content__item flex">
        <div class="item-col">
          <div class="item-col__count"><?php echo $parcels['total']; ?></div>
          <div class="item-col__text">
            Is viso siuntu
          </div>
        </div>
        <div class="item-col item-col__img">
          <img src="./assets/img/parcel.png" alt="">
        </div>
      </div>

      <div class="admin-content__item flex">
        <div class="item-col">
          <div class="item-col__count"><?php echo $staff['total']; ?></div>
          <div class="item-col__text">
            Is viso kurjeriu
          </div>
        </div>
        <div class="item-col item-col__img">
          <img src="./assets/img/worker.png" alt="">
        </div>
      </div>


      <div class="admin-content__item flex">
        <div class="item-col">
          <div class="item-col__count">10</div>
          <div class="item-col__text">
            Is viso miestu
          </div>
        </div>
        <div class="item-col item-col__img">
          <img src="./assets/img/building.png" alt="">
        </div>
      </div>

    </div>


    <div class="track-img">
      <img src="./assets/img/board.png" alt="track">
    </div>
  </div>
</div>

<?php
include 'includes/footer.php'
?>