<?php

if(isset($_GET['id']) && $_GET['id'] != '') {
  include 'db_connect.php';
  $id = $_GET['id'];

  $qry = $conn->query("SELECT * FROM parcels where id = '$id'");
  $parcel = $qry ->fetch_assoc();
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

  // , sender_name, sender_contact, recipient_name, recipient_contact, from_city_id, to_city_id, weigth_id, size_id, price, status;
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
          <input type="text" id="name" name="sender_first_name" value="<?php echo isset($sender_name[0]) ? $sender_name[0] : '' ?>">
        </div>
        <div class="">
          <label for="last_name">Pavarde</label>
          <input type="text" id="last_name" name="sender_last_name" value="<?php echo isset($sender_name[1]) ? $sender_name[1] : '' ?>">
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
          <input type="text" id="name" name="recipient_first_name" value="<?php echo isset($recipient_name[0]) ? $recipient_name[0] : '' ?>">
        </div>
        <div class="">
          <label for="last_name">Pavarde</label>
          <input type="text" id="last_name" name="recipient_last_name" value="<?php echo isset($recipient_name[1]) ? $recipient_name[1] : '' ?>">
        </div>
        <div class="">
          <label for="tel_number">Numeris</label>
          <input type="text" id="tel_number" name="recipient_tel_number" value="<?php echo isset($recipient_contact) ? $recipient_contact : '' ?>">
        </div>
      </div>
    </div>

    <div class="">
      <div class="">Siuntinio informacija</div>
      <div class="flex">
        <div class="">
          <label for="from_city">Is kurio mesto</label>
          <select name="from_city" id="">
          <?php
              if(isset($from_city_id)){
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

        <div class="">
          <label for="to_city">I kuri miesta</label>
          <select name="to_city" id="">
            <?php
              if(isset($to_city_id)){
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

      <div class="flex">
        <div class="">
          <label for="to_city">Sintos svoris</label>
          <select name="weight" id="">
          <?php
              if(isset($weigth_id)){
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

        <div class="">
          <label for="to_city">Siuntos didis</label>
          <select name="size" id="">
          <?php
              if(isset($size_id)){
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

        <div class="">
          <label for="price">Siuntos kaina</label>
          <input type="text" name="price" id="price" value="<?php echo isset($price) ? $price : '' ?>">
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
