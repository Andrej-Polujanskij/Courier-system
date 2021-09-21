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
        <a href="./all_parcels.php">Visos siuntos</a>
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
  <div class="dashboard-user-complete">
    <div class="">
      <h1>Kurjieriu informacija</h1>
      <hr>
    </div>


    <div class="dashboard-content">

      <form id="new_worker" class="needs-validation-staff" novalidate>
        <div class="content-subtitle">
          <h2>Prideti nauja kurjeri</h2>
          <hr>
        </div>
        <div class="flex row">

          <div class="mt-3 col">
            <label class="form-label" for="name">Vardas</label>
            <input class="form-control" type="text" id="name" name="worker_first_name" required>
          </div>
          <div class="mt-3 col">
            <label class="form-label" for="last_name">Pavarde</label>
            <input class="form-control" type="text" id="last_name" name="worker_last_name" required>
          </div>
          <div class="mt-3 col">
            <label class="form-label" for="tel_number">Numeris</label>
            <input class="form-control" type="text" id="tel_number" name="worker_tel_number" required>
          </div>
          <div class="mt-3 col">
            <label class="form-label" for="worker_city">Miestas</label>
            <select class="form-select" name="worker_city" id="worker_city" required>
              <?php echo citySelectOptions(''); ?>
            </select>
          </div>
        </div>


        <div class="">
          <button class="btn btn-main mt-3" type="submit">Issaugoti</button>
        </div>

      </form>

    </div>

    <div class="dashboard-content">
      <div class="content-subtitle">
        <h2>Visi kurjeriai</h2>
        <hr>
      </div>

      <table class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Darbotojas</th>
            <th>Kontaktinis numeris</th>
            <th>Darbo miestas</th>
            <th>Darbotojo veiksmai</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $qry = $conn->query("SELECT id, full_name, contact_number, city_id FROM staff ");
          while ($row = $qry->fetch_assoc()) :
          ?>
            <tr>
              <td><?php echo ($row['id']) ?></td>
              <td><?php echo ($row['full_name']) ?></td>
              <td><?php echo ($row['contact_number']) ?></td>
              <td><?php echo getCityOptions($row['city_id']) ?></td>
              <td>
                <div class="">
                  <button title="Peržiūrėti" class="view_worker_parcels btn btn-success mr-n1" type="button" data-id="<?php echo $row['id'] ?>">
                    <img class="max-w-20" src="./assets/img/eye.png" alt="">
                  </button>
                  <button title="Ištrinti" class="delete_worker_btn btn btn-danger" type="button" data-id="<?php echo $row['id'] ?>">
                    <img class="max-w-20" src="./assets/img/bin.png" alt="">
                  </button>
                </div>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>


      <div class="full_info_table">
        <div class="content-subtitle">
          <h2>Visos darbotojo siuntos</h2>
          <hr>
        </div>

      </div>
    </div>


    <div class="track-img">
      <img src="./assets/img/worker.png" alt="track">
    </div>
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
        At rikrai noryte ištrintį siuntą?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal">Uždaryti</button>
        <button type="button" class="btn btn-danger modal-cta">Ištrinti</button>
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
        Siunta sekmingai istrinta
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary modal-close" data-bs-dismiss="modal">Uždaryti</button>
      </div>
    </div>
  </div>
</div>



<?php
include 'includes/footer.php'
?>