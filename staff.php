<?php
include 'db_connect.php';
include 'includes/header.php'
?>

<div class="flex">
  <div>
    <h1>Darbotojai</h1>
    <div class="">
      <ul>
        <li>
          <a href="./all_parcels.php">Visos siuntos</a>
        </li>
        <li>
          <a href="./staff.php">Darbotojai</a>
        </li>
      </ul>
    </div>

    <div class="flex">
      <a href="./index.php">Namo</a>
    </div>
  </div>
  <div class="dashboard-content">

    <form id="new_worker">
      <div class="flex">
        <div class="">
          <div class="">Darbotojo info</div>
          <div class="">
            <label for="name">Vardas</label>
            <input type="text" id="name" name="worker_first_name">
          </div>
          <div class="">
            <label for="last_name">Pavarde</label>
            <input type="text" id="last_name" name="worker_last_name">
          </div>
          <div class="">
            <label for="tel_number">Numeris</label>
            <input type="text" id="tel_number" name="worker_tel_number">
          </div>
          <div class="">
            <label for="worker_city">Miestas</label>
            <select name="worker_city" id="worker_city">
              <option value="1">Vilnius</option>
              <option value="2">Kaunas</option>
            </select>
          </div>
        </div>
      </div>

      <div class="">
        <button type="submit">Issaugoti</button>
      </div>

    </form>


    <div class="">
      <table style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Darbotojas</th>
            <th>Kontaktinis numeris</th>
            <th>Darbo miestas</th>
            <th>Darbotojo veiksmai</th>
            <th>Darbotojo siuntos</th>
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
              <td><?php echo ($row['city_id']) ?></td>
              <td>
                <div class="flex">
                  <button class="delete_worker_btn" type="button" data-id="<?php echo $row['id'] ?>">Del</button>
                </div>
              <td><button class="view_worker_parcels" type="button" data-id="<?php echo $row['id'] ?>">Perziureti</button></td>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      



      <div class="full_info_table">
        <h2>Visos darbotojo siuntos</h2>

      </div>

    </div>
  </div>
</div>
<?php
include 'includes/footer.php'
?>