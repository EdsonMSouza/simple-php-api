<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

# Configura o cabeçalho para requisições JSON
header("Content-Type: application/json; charset=utf-8");

$host = "mysql.hostinger.com.br"; //replace with database hostname 
$db_name = "u388787754_uni9bonus"; //replace with database name
$username = "u388787754_uni9bonus"; //replace with database username 
$password = "Bonus123"; //replace with database password 

$con = new mysqli("$host", "$username", "$password", "$db_name");

$sql = "select * from teste";

$result = $con->query($sql);
$json = array();

//if ($result->mysqli_fetch_array()) {//mysql_num_rows($result
    while ($row = mysqli_fetch_assoc($result)) {
        $json[] = $row;
    }
//}
mysqli_close($con);
echo json_encode($json);