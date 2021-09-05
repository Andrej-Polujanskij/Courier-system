<?php
include 'db_connect.php';
include 'includes/header.php'
?>

<div class="flex">
  <div class="">
    <h1>Visos siuntos</h1>

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
    <table style="width:100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Siuntos numeris</th>
          <th>Siuntejo vardas</th>
          <th>Gavejo vardas</th>
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
            <td><?php echo ($row['status']) ?></td>
            <td>
              <div class="flex">
                <button class="view_parcel_btn" type="button" data-id="<?php echo $row['id'] ?>">All</button> ||
                <a class="update_parcel_btn" type="button" href="./new_parcel.php?id=<?php echo $row['id'] ?>">update</a>
                <button class="delete_parcel_btn" type="button" data-id="<?php echo $row['id'] ?>">Del</button>
              </div>
            </td>
            <td>
              <?php
              if ($row['parcel_worker_id'] == 0) {
                $from_city_id = $row['from_city_id'];
                $qry2 = $conn->query("SELECT id, full_name  FROM staff where city_id = $from_city_id");
              ?>
                <button class="add_courier" type="button">Prideti kurjeri</button>

                <?php
                if ($qry2->num_rows > 0) {
                ?>
                  <form id="parcel_worker_id--<?php echo $row['id'] ?>" class="parcel_worker" data-id="<?php echo $row['id'] ?>">
                    <select name="parcel_worker_id" id="">
                      <?php
                      while ($row2 = $qry2->fetch_assoc()) :
                      ?>
                        <option value="<?php echo $row2['id'] ?>">
                          <?php echo $row2['full_name'] ?>
                        </option>
                      <?php endwhile; ?>
                    </select>
                    <button data-id="<?php echo $row['id'] ?>" class="set_parcel_worker"  type="submit">Issaugoti</button>
                  </form>
                <?php
                } else {
                ?>
                  <div class="parcel_worker">
                    Kurjerio is sito miesto nera
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

    </div>

  </div>
</div>


<?php
include 'includes/footer.php'
?>