<?php
include 'db_connect.php';
include 'shared_functions.php';
include 'includes/header.php';
?>


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
        <a href="./staff.php">Kurjeriai</a>
      </li>
      <li>
        <a href="./index.php">Pagrindinis</a>
      </li>
    </ul>
  </nav>
</div>

<div class="dashboard">
  <div class="dashboard-user-complete">
    <div class="">
      <h1>Visos siuntos</h1>
      <hr>
    </div>


    <table style="width:100%" class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Siuntos numeris</th>
          <th>Siuntėjo vardas</th>
          <th>Gavėjo vardas</th>
          <th>Siuntos statusas</th>
          <th>Siuntos veiksmai</th>
          <th>Priskirtas kurjeris</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $qry = $conn->query("SELECT id, reference_number, sender_name, recipient_name, status, parcel_worker_id, from_city_id  FROM parcels ");
        while ($row = $qry->fetch_assoc()) :
        ?>
          <tr>
            <td><?php echo ($row['id']) ?></td>
            <td><?php echo ($row['reference_number']) ?></td>
            <td><?php echo ($row['sender_name']) ?></td>
            <td><?php echo ($row['recipient_name']) ?></td>
            <td>
              <?php echo getParcelStatus($row['status']); ?>
            </td>
            <td>
              <div class="flex justify-evently">
                <button title="Peržiūrėti" class="view_parcel_btn btn btn-success" type="button" data-id="<?php echo $row['id'] ?>">
                  <img class="max-w-20" src="./assets/img/eye.png" alt="">
                </button>
                <a title="Redaguoti" class="update_parcel_btn btn btn-warning" type="button" href="./new_parcel.php?id=<?php echo $row['id'] ?>">
                  <img class="max-w-20" src="./assets/img/update.png" alt="">
                </a>
                <button title="Ištrinti" class="delete_parcel_btn btn btn-danger" type="button" data-id="<?php echo $row['id'] ?>">
                  <img class="max-w-20" src="./assets/img/bin.png" alt="">
                </button>
              </div>
            </td>
            <td>
              <?php
              if ($row['parcel_worker_id'] == 0) {
                $from_city_id = $row['from_city_id'];
                $qry2 = $conn->query("SELECT id, full_name  FROM staff where city_id = $from_city_id");
              ?>
                <button class="add_courier btn btn-main" type="button">Pridėti kurjerį</button>

                <?php
                if ($qry2->num_rows > 0) {
                ?>
                  <form id="parcel_worker_id--<?php echo $row['id'] ?>" class="parcel_worker" data-id="<?php echo $row['id'] ?>">
                    <select class="form-select" name="parcel_worker_id" id="">
                      <?php
                      while ($row2 = $qry2->fetch_assoc()) :
                      ?>
                        <option value="<?php echo $row2['id'] ?>">
                          <?php echo $row2['full_name'] ?>
                        </option>
                      <?php endwhile; ?>
                    </select>
                    <button data-id="<?php echo $row['id'] ?>" class="set_parcel_worker btn btn-main mt-1" type="submit">Išsaugoti</button>
                  </form>
                <?php
                } else {
                ?>
                  <div class="parcel_worker ">
                    Kurjerio iš šito miesto nėra
                  </div>
                <?php
                } ?>
              <?php
              } else {
                $parcel_worker_id = $row['parcel_worker_id'];
                $qry3 = $conn->query("SELECT full_name  FROM staff where id = $parcel_worker_id");
                while ($row3 = $qry3->fetch_assoc()) :
                  echo $row3['full_name'];
                endwhile;
              }
              ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>


    <div class="full_info_table">
      <h2>Visa siuntos informacija</h2>
      <hr>

    </div>

    <div class="track-img">
      <img src="./assets/img/parcel-icon.png" alt="track">
    </div>

  </div>


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dėmesio!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Uždaryti"></button>
        </div>
        <div class="modal-body fw-bold">
          Ar tikrai norite ištrinti siuntą?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal">Uždaryti</button>
          <button type="button" class="btn btn-danger modal-cta">Ištrinti</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dėmesio!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Uždaryti"></button>
      </div>
      <div class="modal-body fw-bold modal-body-courier">
        Siunta sėkmingai ištrinta
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal">Uždaryti</button>
      </div>
    </div>
  </div>
</div>
</div>



<?php
include 'includes/footer.php'
?>