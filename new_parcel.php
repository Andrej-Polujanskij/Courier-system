<?php
include 'shared_functions.php';

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
  <div class="dashboard-user-complete">
    <div class="">
      <h1>Nauja siunta</h1>
      <hr>
    </div>

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
              <input class="form-control" type="number" id="tel_number" name="sender_tel_number" value="<?php echo isset($sender_contact) ? $sender_contact : '' ?>" required>
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
              <input class="form-control" type="number" id="tel_number" name="recipient_tel_number" value="<?php echo isset($recipient_contact) ? $recipient_contact : '' ?>" required>
            </div>
          </div>
        </div>

        <div class="mt-4">
          <div class="new_parcel-title">Siuntinio informacija</div>
          <div class=" row mt-3">
            <div class="col">
              <label class="form-label" for="from_city">Is kurio mesto</label>
              <select class="form-select city-select" name="from_city" id="" required>
                <?php echo citySelectOptions(isset($from_city_id) ? $from_city_id : ''); ?>
              </select>
            </div>

            <div class="col">
              <label class="form-label" for="to_city">I kuri miesta</label>
              <select class="form-select city-select" name="to_city" id="" required>
                <?php echo citySelectOptions(isset($to_city_id) ? $to_city_id : ''); ?>
              </select>
            </div>
          </div>

          <div class=" row mt-3">
            <div class="col">
              <label class="form-label" for="to_city">Sintos svoris</label>
              <select class="form-select select-for-price form-select-weight" name="weight" id="" required>
                <?php echo weigtSelectOptions(isset($weigth_id) ? $weigth_id : ''); ?>
              </select>
            </div>

            <div class="col">
              <label class="form-label" for="to_city">Siuntos didis</label>
              <select class="form-select select-for-price form-select-size" name="size" id="" required>
                <?php echo sizeSelectOptions(isset($size_id) ? $size_id : ''); ?>
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




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Demesio!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Siunta sekminai issaugota
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <div class="track-img mt-3">
      <img src="./assets/img/send-hands.png" alt="track">
    </div>
  </div>
</div>

<?php
include 'includes/footer.php'
?>