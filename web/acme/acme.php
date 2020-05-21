<?php
require ('dbConnect.php');
$db = get_db();

// SELECT customer_id, first_name, last_name FROM customer;
$query = 'SELECT customer_id, first_name, last_name FROM customer';
$stmt = $db->prepare($query);
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        
        <title>Acme Enterprises</title>
        
    </head>
    <body>
        <h1>This is test for Acme Enterprises</h1>

        <?php
            foreach ($customers as $customer )
            {
                $customer_id =$customer ['customer_id'];
                $first_name = $customer['first_name'];
                $last_name = $customer['last_name'];

                echo "<li><p> $first_name - $last_name</p></li>";

            }
        ?>

    </body>
</html>