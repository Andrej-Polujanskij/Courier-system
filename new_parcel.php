<?php

if (isset($_GET['id']) && $_GET['id'] != '') {
  include 'db_connect.php';
  $id = $_GET['id'];

  $qry = $conn->query("SELECT * FROM parcels where id = '$id'");
  $parcel = $qry->fetch_assoc();
  // print_r(explode(" ", $parcel['sender_name']));

  $sender_name = explode(" ", $parcel['sender_name']);
  $sender_contact = $parcel['sender_contact'];
  $recipient_name = explode(" ", $parcel['recipient_name']);
  $recipient_contact = $parcel['recipient_contact'];
  $from_city_id = $parcel['from_city_id'];
  $to_city_id = $parcel['to_city_id'];
  $weigth_id = $parcel['weigth_id'];
  $size_id = $parcel['size_id'];
  $price = $parcel['price'];

}

?>
<?php
include 'includes/header.php';
?>

<div class="aside">
  <?php
  include 'includes/back_btn.php'
  ?>

  <nav>
    <ul class="menu">
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
<div class="">
  <form id="new_parcel" class="needs-validation" novalidate>
    <input type="hidden" class="new_parcel_id" name="id" value="<?php echo isset($id) ? $id : '' ?>">
    <div class="flex row">
      <div class="col">
        <div class="new_parcel-title">Siuniejo informacija</div>
        <div class="mt-3">
          <label class="form-label" for="name">Vardas</label>
          <input class="form-control" type="text" id="name" name="sender_first_name" value="<?php echo isset($sender_name[0]) ? $sender_name[0] : '' ?>" required>
        </div>
        <div class="mt-3">
          <label class="form-label" for="last_name">Pavarde</label>
          <input class="form-control" type="text" id="last_name" name="sender_last_name" value="<?php echo isset($sender_name[1]) ? $sender_name[1] : '' ?>" required>
        </div>
        <div class="mt-3">
          <label class="form-label" for="tel_number">Numeris</label>
          <input class="form-control" type="text" id="tel_number" name="sender_tel_number" value="<?php echo isset($sender_contact) ? $sender_contact : '' ?>" required>
        </div>
      </div>

      <div class="col">
        <div class="new_parcel-title">Gaviejo informcija</div>
        <div class="mt-3">
          <label class="form-label" for="name">Vardas</label>
          <input class="form-control" type="text" id="name" name="recipient_first_name" value="<?php echo isset($recipient_name[0]) ? $recipient_name[0] : '' ?>" required>
        </div>
        <div class="mt-3">
          <label class="form-label" for="last_name">Pavarde</label>
          <input class="form-control" type="text" id="last_name" name="recipient_last_name" value="<?php echo isset($recipient_name[1]) ? $recipient_name[1] : '' ?>" required>
        </div>
        <div class="mt-3">
          <label class="form-label" for="tel_number">Numeris</label>
          <input class="form-control" type="text" id="tel_number" name="recipient_tel_number" value="<?php echo isset($recipient_contact) ? $recipient_contact : '' ?>" required>
        </div>
      </div>
    </div>

    <div class="mt-4">
      <div class="new_parcel-title">Siuntinio informacija</div>
      <div class=" row mt-3">
        <div class="col">
          <label class="form-label" for="from_city">Is kurio mesto</label>
          <select class="form-select" name="from_city" id="" required>
            <?php
            if (isset($from_city_id)) {
            ?>
              <option hidden disabled selected value="<?php echo $from_city_id ?>"><?php echo $from_city_id ?></option>
            <?php
            }
            ?>
            <option value="1">Vilnius</option>
            <option value="2">Kaunas</option>
            <option value="3">Alytus</option>
          </select>
        </div>

        <div class="col">
          <label class="form-label" for="to_city">I kuri miesta</label>
          <select class="form-select" name="to_city" id="" required>
            <?php
            if (isset($to_city_id)) {
            ?>
              <option hidden disabled selected value="<?php echo $to_city_id ?>"><?php echo $to_city_id ?></option>
            <?php
            }
            ?>
            <option value="1">Vilnius</option>
            <option value="2">Kaunas</option>
            <option value="3">Alytus</option>
          </select>
        </div>
      </div>

      <div class=" row mt-3">
        <div class="col">
          <label class="form-label" for="to_city">Sintos svoris</label>
          <select class="form-select form-select-weight" name="weight" id="" required>
            <?php
            if (isset($weigth_id)) {
            ?>
              <option hidden disabled selected value="<?php echo $weigth_id ?>"><?php echo $weigth_id ?></option>
            <?php
            }
            ?>
            <option value="1">Iki 10kg</option>
            <option value="2">Iki 20kg</option>
            <option value="3">Iki 30kg</option>
          </select>
        </div>

        <div class="col">
          <label class="form-label" for="to_city">Siuntos didis</label>
          <select class="form-select form-select-size" name="size" id="" required>
            <?php
            if (isset($size_id)) {
            ?>
              <option hidden disabled selected value="<?php echo $size_id ?>"><?php echo $size_id ?></option>
            <?php
            }
            ?>
            <option value="1">0.5m*0.5m</option>
            <option value="2">1m*1m</option>
            <option value="3">1.5m*1.5m</option>
          </select>
        </div>

        <div class="col">
          <label class="form-label" for="price">Siuntos kaina</label>
          <input readonly class="form-control" type="text" name="price" id="price" value="<?php echo isset($price) ? $price : '' ?>">
        </div>

      </div>
    </div>

    <div class="mt-3">
      <button class="btn btn-main" type="submit">Išsaugoti</button>
    </div>

  </form>
</div>

</div>

<?php
include 'includes/footer.php'
?>