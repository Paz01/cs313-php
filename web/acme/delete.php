
<?php

require_once('dbConnect.php');
$db = get_db();

    if(!empty($_GET))
    {
        $record_id = $_GET ['record'];
        //print_r($record_id);

        $query = "DELETE FROM customer WHERE customer_id = $record_id;";

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

    echo '<br/>';
             
        echo '<a href="job.php?Job Control Panel" <button class="btn btn-success mt-3 " name="Job Control Panel">Job Control Panel</button></a>';
        echo '<br/>';
        echo '<a href="acme.php?Customer Control Panel" <button class="btn btn-success mt-3 " name="Customer Control Panel">Customer Control Panel</button></a>';
?>