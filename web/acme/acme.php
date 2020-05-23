<?php
require ('dbConnect.php');
$db = get_db();

// SELECT customer_id, first_name, last_name FROM customer;
$query = 'SELECT customer_id, first_name, last_name, phone FROM customer';
$stmt = $db->prepare($query);
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php

// SELECT type_of_service FROM service;
$query1 = 'SELECT type_of_service FROM service';
$stmt1 = $db->prepare($query);
$stmt1->execute();
$services = $stmt1->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>Acme Enterprises test</title>
    </head>
    <body>
        <h1>This is test for Acme Enterprises</h1>

        <?php
            foreach ($customers as $customer )
            {
                $customer_id =$customer ['customer_id'];
                $first_name = $customer['first_name'];
                $last_name = $customer['last_name'];
                $phone = $customer['phone'];

                echo "<li><p> $first_name - $last_name - $phone </p></li>";

            }
        ?>

        <?php

            foreach ($services as $services)
            {
                $type_of_service = $services['type_of_service'];

                echo $type_of_service ;
            }


        ?>



    </body>
</html>