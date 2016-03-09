<?php

require_once('../includes/db.php');

if($_POST['listid'] && $_POST['itemName']){

	$query = "INSERT INTO list_items (item_name, list_id) VALUES (:itemname, :listid)";
    $result = $DBH->prepare($query);
    $result->bindParam(':itemname', $_POST['itemName']);
    $result->bindParam(':listid', $_POST['listid']);
    $result->execute();

    echo $DBH->lastInsertId();
}


?>