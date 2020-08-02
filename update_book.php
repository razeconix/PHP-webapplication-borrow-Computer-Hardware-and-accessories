<?php
session_start();
include  "fucntion_query.php";
$data = $_REQUEST;
global $conn ;
$sql ="UPDATE tb_hardware SET hardware_name = '".$data['hardware_name']."',
type_id = '". $data['type_id']."',
brand_id = '".$data['brand_id']."',
hardware_status = '".$data['hardware_status']."'
WHERE hardware_id = '".$data['hardware_id']."'";
$result = $conn->query($sql);


header("Location: book_update.php?hardware_id={$data['hardware_id']}");
