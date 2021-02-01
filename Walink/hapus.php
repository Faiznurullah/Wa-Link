<?php
include 'model.php';
$hapus = new wa();
$id = $_REQUEST['id'];
$delete = $hapus->delete($id);

if($delete){
  header('location: list.php');
}

?>
