<?php
try {
    $conn = new PDO(
        'mysql:host=localhost; dbname=db_commerceart; charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (PDOException $ex) {
    echo $ex;
}

function load_user_last_activity($user_id, $conn)
{
    $query = "SELECT * FROM tb_login_details WHERE ref_user = '$user_id' ORDER BY last_activity DESC LIMIT 1";
    $statement = $conn->prepare($query);
    $statement->execute();
    $resultat = $statement->fetchAll();
    foreach ($resultat as $row) {
        return $row['last_activity'];
    }
}

function load_user_chat_history($from_user_id, $to_user_id, $conn)
{
    $query = "SELECT * FROM tb_chat_message WHERE (from_user_id ='" . $from_user_id . "' 
    AND to_user_id ='" . $to_user_id . "') OR (from_user_id='" . $to_user_id . "' 
    AND to_user_id='" . $from_user_id . "') ORDER BY dateamp DESC";
    $statement = $conn->prepare($query);
    $statement->execute();
    $resultat = $statement->fetchAll();
    $output = '<ul class="list-unstyled">';
    $position="";
    foreach ($resultat as $row) {
        $color="";
        $marginLeft=0;
        $marginRight=0;
        $borderRight=0;
        $borderLeft=0;
        $user_name = '';
        if ($row['from_user_id'] == $from_user_id) {
            $user_name = '<b class="text-success">Moi</b>';
            $position="right";
            $marginLeft=200;
            $borderLeft=35;
            $color="rgb(157, 203, 234)";
        } else {
            $user_name = '<b class="text-danger">' . get_user_name($row['from_user_id'], $conn) . '</b>';
            $position="left";
            $marginRight=200;
            $borderRight=35;
            $color="rgb(222, 237, 248)";
        }
        $output .= '
            <li class="message-box" style="border-bottom:1px dotted #000; background-color: '.$color.'; margin-top:5px; margin-left:'.$marginLeft.'px; margin-right:'.$marginRight.'px; padding:5px; border-radius:'.$borderLeft.'px '.$borderRight.'px 20px 20px;">
                <p style="float:'.$position.'">
                    <div style="text-align:'.$position.'; font-size:14px;">' . $user_name . ' : ' . $row['chat_message'] . '</div>
                    <div align="'.$position.'" style="margin-left:50px; text-align:'.$position.';font-size:12px;">
                        <small><em>' . $row['dateamp'] . '</em></small>
                    </div>
                </p>
            </li>
        ';
    }
    $output .= '</ul>';
    //$query = 'UPDATE tb_chat_message SET status = 0 WHERE from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."' AND status = 1';
    //$statement = $conn->prepare($query);
    //$statement->execute();
    return $output;
}

function get_user_name($user_id, $conn)
{
    $query = "SELECT log_nom FROM tb_login WHERE id_log ='$user_id'";
    $statement = $conn->prepare($query);
    $statement->execute();
    $resultat = $statement->fetchAll();
    foreach ($resultat as $row) {
        return $row['log_nom'];
    }
}

//Messages non lit
function count_message_non_lit($from_user_id, $to_user_id, $conn)
{
    $query = "SELECT * FROM tb_chat_message WHERE from_user_id ='$from_user_id' AND to_user_id ='$to_user_id'";
    $statement = $conn->prepare($query);
    $statement->execute();
    $count = $statement->rowCount();
    $output = '';
    if ($count > 0) {
        $output = '<span class="label label-success">' . $count . '</span>';
    }
    return $output;
}