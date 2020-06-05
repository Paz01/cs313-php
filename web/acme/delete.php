<?php

require_once('dbConnect.php');
$db = get_db();

    if(!empty($_GET))
    {
        $record_id = $_GET ['record'];

        $query = "DELETE FROM customer WHERE id=$record_id;";

        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->fetchALL(PDO::FETCH_ASSOC); 

        $is_deleted = true;

        if($is_deleted)
        {
            echo "Your record has been deleted";
        }
        else
        {
            echo "Can not delete record";
        }
    }
?>