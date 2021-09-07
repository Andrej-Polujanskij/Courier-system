<?php
ob_start();
include 'db_connect.php';


function save_new_parcel()
{
  global $conn;

  $id = $_POST['id'];

  if (empty($_POST['id'])) {
    $i = 0;
    while ($i == 0) {
      $ref = uniqid('', true);
      $chk = $conn->query("SELECT * FROM parcels where reference_number = '$ref'")->num_rows;
      if ($chk <= 0) {
        $i = 1;
      }
    }

    $sql = "INSERT INTO parcels (reference_number, sender_name, sender_contact, recipient_name, recipient_contact, from_city_id, to_city_id, weigth_id, size_id, price, status)
  VALUES ('$ref', '{$_POST['sender_first_name']} ' '{$_POST['sender_last_name']}', '{$_POST['sender_tel_number']}', '{$_POST['recipient_first_name']} ' '{$_POST['recipient_last_name']}', '{$_POST['recipient_tel_number']}', '{$_POST['from_city']}', '{$_POST['to_city']}', '{$_POST['weight']}', '{$_POST['size']}', '{$_POST['price']}', '1')";

    if ($conn->query($sql) === true) {
      echo "$ref";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    $currentQuery = $conn->query("SELECT * FROM parcels where id = $id");
    $item = $currentQuery->fetch_assoc();

    $sql = "UPDATE parcels SET sender_name='{$_POST['sender_first_name']} ' '{$_POST['sender_last_name']}', sender_contact='{$_POST['sender_tel_number']}',  recipient_name='{$_POST['recipient_first_name']} ' '{$_POST['recipient_last_name']}', recipient_contact='{$_POST['recipient_tel_number']}', from_city_id='{$_POST['from_city']}', to_city_id='{$_POST['to_city']}', weigth_id='{$_POST['weight']}', size_id='{$_POST['size']}', price='{$_POST['price']}' WHERE id=$id";

    if ($conn->query($sql) === true) {
      echo $item['reference_number'];
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  die();
}

function get_parcel_heistory()
{
  global $conn;

  $ref_no = $_POST['parcel_search'];
  $parcel = $conn->query("SELECT * FROM parcels where reference_number = '$ref_no'");

  if ($parcel->num_rows <= 0) {
    return 2;
  } else {
    return json_encode($parcel->fetch_assoc());
  }

  die();
}

function delete_parcel()
{
  global $conn;

  $id = $_POST['id'];
  $delete = $conn->query("DELETE FROM parcels where id = $id");
  if ($delete) {
    return 1;
  }
  die();
}

function view_parcel()
{
  global $conn;

  $id = $_POST['id'];
  $parcel = $conn->query("SELECT * FROM parcels where id = '$id'");

  return json_encode($parcel->fetch_assoc());
  die();
}

function view_worker_parcels()
{
  global $conn;

  $id = $_POST['id'];
  $parcel = $conn->query("SELECT * FROM parcels where parcel_worker_id = '$id'");
  $data = array();
  while ($row = $parcel->fetch_assoc()) :
    $data[] = $row;
  endwhile;
  return json_encode($data);
  die();
}

function save_new_worker()
{
  global $conn;

  $name = $_POST['worker_first_name'];

  $sql = "INSERT INTO staff ( full_name, contact_number, city_id)
  VALUES ('{$_POST['worker_first_name']} ' '{$_POST['worker_last_name']}', '{$_POST['worker_tel_number']}', '{$_POST['worker_city']}')";

  if ($conn->query($sql) === TRUE) {
    echo "$name";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  die();
}

function delete_worker()
{
  global $conn;

  $id = $_POST['id'];
  $delete = $conn->query("DELETE FROM staff where id = $id");
  if ($delete) {
    return 1;
  }
  die();
}

function parcel_worker_id()
{
  global $conn;

  $id = $_POST['id'];
  $sql = "UPDATE parcels SET parcel_worker_id='{$_POST['parcel_worker_id']}' WHERE id=$id";

  if ($conn->query($sql) === true) {
    return 1;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  die();
}


$action = $_GET['action'];
if ($action == 'save_new_parcel') {
  $save = save_new_parcel();
  if ($save)
    echo $save;
}

if ($action == 'get_parcel_heistory') {
  $get = get_parcel_heistory();
  if ($get)
    echo $get;
}

if ($action == 'delete_parcel') {
  $del = delete_parcel();
  if ($del)
    echo $del;
}

if ($action == 'view_parcel') {
  $get = view_parcel();
  if ($get)
    echo $get;
}

if ($action == 'view_worker_parcels') {
  $get = view_worker_parcels();
  if ($get)
    echo $get;
}

if ($action == 'save_new_worker') {
  $save = save_new_worker();
  if ($save)
    echo $save;
}

if ($action == 'delete_worker') {
  $del = delete_worker();
  if ($del)
    echo $del;
}

if ($action == 'parcel_worker_id') {
  $set = parcel_worker_id();
  if ($set)
    echo $set;
}

ob_end_flush();
