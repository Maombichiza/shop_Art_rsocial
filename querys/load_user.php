<?php
include("../includes/connxion_pdo.php");
session_start();
$query = "SELECT * FROM tb_login WHERE id_log != '" . $_SESSION["users_id"] . "'";
$statement = $conn->prepare($query);
$statement->execute();
$resulat = $statement->fetchAll();

$output = '
    <div style="
    height:470px; 
    overflow-y:scroll;

    ">
    <table class="table">
';

foreach ($resulat as $row) {
    $status = '';
    $current_time = strtotime(date('Y-m-d H:i:s') . '-10 second');
    $current_time = date('Y-m-d H:i:s', $current_time);
    $user_lastActivity = load_user_last_activity($row['id_log'], $conn);
    if ($user_lastActivity > $current_time) {
        $status = '<small class="text-success">En ligne</small>';
    } else {
        $status = '<small class="text-danger">Pas Connecté(e)</small>';
    }
    $output .= '
        <tr>
            <td> <img src="profile_images/'. $row["log_photo"].'" width="40" class="img img-circle" /> ' . ' <b>' . $row['log_nom'] . '</b></td>
            <td> ' . $status . ' </td>
            <td> 
                <button type="button" class="btn btn-info btn-xs start_chat" data-touserid="' . $row['id_log'] . '" 
                data-tousername="' . $row['log_nom'] . '">Contacter</button>
            </td>
        </tr>
    ';
}
$output .= '</table> </div>';
echo $output;