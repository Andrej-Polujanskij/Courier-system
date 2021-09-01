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
        </tr>
      </thead>
      <tbody>
        <?php
        $qry = $conn->query("SELECT id, reference_number, sender_name, recipient_name, status  FROM parcels ");
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