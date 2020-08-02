<?php
date_default_timezone_set("Asia/Bangkok");
?>
<?php
require_once 'connect_db.php';

function checkLogin($username,$pass){
	global $conn ;
	$sql = "SELECT * FROM tb_user WHERE student_id = '$username' AND password = '$pass' ";
	$result = $conn->query($sql);
	$row = $result->fetch_object();

	return $row;
}

function getUser($id){
	global $conn ;
	$sql = "SELECT * FROM tb_user WHERE user_id = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_object();

	return $row;
}

function insertUser($data){
	global $conn ;
	$sql ="INSERT INTO tb_user (user_id, student_id, password, name, lastname, status)
	VALUES (NULL, '".$data['username']."', '".$data['password']."', '".$data['name']."', '".$data['lastname']."', '0');";
	$result = $conn->query($sql);
	$id = $conn->insert_id;

	return $id;

}

function GetDataBooks(){
	global $conn ;
	$sql = "SELECT * FROM tb_hardware b INNER JOIN tb_type t on t.type_id = b.type_id INNER JOIN tb_brand br on br.brand_id = b.brand_id";

	$result = $conn->query($sql);
	$results = [];
	while ($row = $result->fetch_object()) {
		$results[] = $row;
	}

	return $results;
}

function InsertLendBook($id){
	global $conn ;
	$date = date('Y-m-d H:i:s');

	$sql = "INSERT INTO tb_history (history_id, user_id, history_date, history_status)
	VALUES (NULL, '$id', '$date', '0');";
	$result = $conn->query($sql);
	$id = $conn->insert_id;

	return $id;
}

function InsertDetailLead($history_id,$boo_id){
	global $conn ;
	$date_strat = date('Y-m-d H:i:s');
	$date_end = date('Y-m-d', strtotime("+30 days"));
	$sql = "INSERT INTO tb_detail (detail_id, history_id, hardware_id, status_lend, lend_date_end, fine, lent_date_strat) VALUES (NULL, '$history_id', '$boo_id', '0', '$date_end', '0', '$date_strat');";
	$result = $conn->query($sql);
	$id = $conn->insert_id;

	return $id;
}

function UpdatestatusBook($hardware_id,$status){
	global $conn ;
	echo $sql ="UPDATE tb_hardware SET hardware_status = '$status' WHERE hardware_id = $hardware_id;";
	$result = $conn->query($sql);
	return "update";

}
function DateThai($strDate)
{
	$strYear = date("Y",strtotime($strDate))+543;
	$strMonth= date("n",strtotime($strDate));
	$strDay= date("j",strtotime($strDate));
	$strHour= date("H",strtotime($strDate));
	$strMinute= date("i",strtotime($strDate));
	$strSeconds= date("s",strtotime($strDate));
	$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	$strMonthThai=$strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear";
}
//แก้แล้ว
function GetDetailLend($id){
	global $conn ;
	$sql ="SELECT h.*,d.*,b.hardware_name,b.hardware_status
	FROM tb_history h
	LEFT JOIN tb_detail d ON h.history_id = d.history_id
	LEFT JOIN tb_hardware b ON d.hardware_id = b.hardware_id
	WHERE h.user_id = $id
	ORDER BY h.history_date DESC";
	$result = $conn->query($sql);
	$results = [];
	while ($row = $result->fetch_object()) {
		$results[] = $row;
	}

	return $results;
}
//แก้แล้ว เหลือjoin
function GetDataLend(){
	global $conn ;
	$sql ="SELECT h.*,d.*,b.hardware_name,b.hardware_status,u.name,u.lastname,u.student_id,br.brand_name,t.type_name
	 FROM tb_history h
	 LEFT JOIN tb_detail d ON h.history_id = d.history_id
	 LEFT JOIN tb_hardware b ON d.hardware_id = b.hardware_id
	 LEFT JOIN tb_user u ON u.user_id = h.user_id
		LEFT JOIN tb_brand br ON b.brand_id = br.brand_id
    LEFT JOIN tb_type t ON b.type_id = t.type_id
	 ORDER BY h.history_date DESC";
	$result = $conn->query($sql);
	$results = [];
	while ($row = $result->fetch_object()) {
		$results[] = $row;
	}

	return $results;
}

function UpdateDataLend($hardware_id,$fine){
	global $conn ;
	$sql ="UPDATE tb_detail SET status_lend = '1',fine = '$fine' WHERE hardware_id = $hardware_id;";
	$result = $conn->query($sql);

	return true;
}

function InsertBook($data){
	global $conn ;
	$date = date('Y-m-d');
	echo $sql ="INSERT INTO tb_hardware (hardware_id, hardware_name,type_id,brand_id, hardware_date, hardware_status )
	VALUES (NULL, '".$data['hardware_name']."' ,'".$data['type_id']."','".$data['brand_id']."', '".$date."', 'ปกติ');";
	$result = $conn->query($sql);

	$id = $conn->insert_id;

	return $id;
}
//เหลือ ตรงนี้ติด error fetch ตอนทำห้องปอ ที่ยังไม่ได้ join ตารางรึไรนี่แหละมันได้
function GetBook($id){
	global $conn ;
	$sql ="SELECT * FROM tb_hardware WHERE hardware_id = '".$id."'";
	$result = $conn->query($sql);
	$row = $result->fetch_object();
	return $row;
}

function UpadateBook($data){
	global $conn ;
	$sql ="UPDATE tb_hardware SET hardware_name = '".$data['hardware_name']."',
	type_id = '". $data['type_id']."',
	brand_id = '".$data[brand_id]."',
	hardware_status = '".$data['hardware_status']."'
	WHERE hardware_id = '".$data['hardware_id']."'";
	$result = $conn->query($sql);
}

function DeleteBook($id){
	global $conn ;
	$sql ="DELETE FROM tb_hardware WHERE hardware_id = $id";
	$result = $conn->query($sql);

}

function DateDiff($strDate1,$strDate2)
{
    return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}
function TimeDiff($strTime1,$strTime2)
{
	return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
}

function DateTimeDiff($strDateTime1,$strDateTime2)
{
    return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 * 24); // 1 Hour =  60*60
}
