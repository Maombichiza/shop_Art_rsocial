<?php
include("../includes/connxion_pdo.php");
session_start();
$query = "UPDATE tb_login_details SET last_activity = now() WHERE login_detail_id = '" . $_SESSION['login_detail_id'] . "'";
$statement = $conn->prepare($query);
$statement->execute();