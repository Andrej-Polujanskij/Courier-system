<?php

if(isset($_GET['id']) && $_GET['id'] != '') {
  include 'db_connect.php';
  $id = $_GET['id'];

  $qry = $conn->query("SELECT * FROM parcels where id = '$id'");
  $parcel = $qry ->fetch_assoc();
  print_r($parcel['sender_contact']);
  // print_r($parcel);
  $sender_contact = $parcel['sender_contact'];
}

echo isset($id) ? $id : ''
 ?>
<?php
include 'includes/header.php';
?>

Nauja siunta
<div class="">
  <form id="new_parcel">
  <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
    <div class="flex">
      <div class="">
        <div class="">Siuniejo info</div>
        <div class="">
          <label for="name">Vardas</label>
          <input type="text" id="name" name="sender_first_name" value="<?php echo isset($firstname) ? $firstname : '' ?>">
        </div>
        <div class="">
          <label for="last_name">Pavarde</label>
          <input type="text" id="last_name" name="sender_last_name">
        </div>
        <div class="">
          <label for="tel_number">Numeris</label>
          <input type="text" id="tel_number" name="sender_tel_number" value="<?php echo isset($sender_contact) ? $sender_contact : '' ?>">
        </div>
      </div>
      <div class="">
        <div class="">Gaviejo info</div>
        <div class="">
          <label for="name">Vardas</label>
          <input type="text" id="name" name="recipient_first_name">
        </div>
        <div class="">
          <label for="last_name">Pavarde</label>
          <input type="text" id="last_name" name="recipient_last_name">
        </div>
        <div class="">
          <label for="tel_number">Numeris</label>
          <input type="text" id="tel_number" name="recipient_tel_number">
        </div>
      </div>
    </div>

    <div class="">
      <div class="">Siuntinio informacija</div>
      <div class="flex">
        <div class="">
          <label for="from_city">Is kurio mesto</label>
          <select name="from_city" id="">
            <option value="1">Vilnius</option>
          </select>
        </div>

        <div class="">
          <label for="to_city">I kuri miesta</label>
          <select name="to_city" id="">
            <option value="2">Kaunas</option>
          </select>
        </div>
      </div>

      <div class="flex">
        <div class="">
          <label for="to_city">Sintos svoris</label>
          <select name="weight" id="">
            <option value="1">Iki 10kg</option>
          </select>
        </div>

        <div class="">
          <label for="to_city">Siuntos didis</label>
          <select name="size" id="">
            <option value="1">0.5m*0.5m</option>
          </select>
        </div>

        <div class="">
          <label for="price">Siuntos kaina</label>
          <input type="text" name="price" id="price">
        </div>

      </div>
    </div>

    <div class="">
      <button type="submit">Issaugoti</button>
    </div>

  </form>
</div>


<div class="flex">
    <a href="./index.php">Namo</a>
    <a href="./track.php">Tikrinti siunta</a>
  </div>
<?php
include 'includes/footer.php'
?>
