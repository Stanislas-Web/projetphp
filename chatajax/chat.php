<?php
$bd=new mysqli("localhost","root","","chat");
if($bd->connect_error){
    die("connection failed: " .$bd->connect_error);
}

$result = array();
$message = isset($_POST['message']) ? $_POST['message']: null; 
$from = isset($_POST['from']) ? $_POST['from']: null;
if(!empty($message) && !empty($from)){
    $sql = "INSERT INTO 'chat' ('message','from') values('".$message."','".$from."')";
    $result['send-status'] = $bd->query($sql);
}
$bd->close();
header('Access-control-Allow-Origin: *');
header('Content-Type: Application/json');
echo json_encode($result);
?>