<?php
include("../includes/connxion_pdo.php");
session_start();

echo load_user_chat_history($_SESSION['users_id'], $_POST['to_user_id'], $conn);