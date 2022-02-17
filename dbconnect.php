<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "criminal_record_management_system";


$conn = new mysqli($servername, $username, $password,$db_name);

if ($conn->connect_error) {
  die( $conn->connect_error);
}
?>