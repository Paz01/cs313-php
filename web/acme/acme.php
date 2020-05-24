<?php
require ('dbConnect.php');
$db = get_db();

session_start();

// SELECT customer_id, first_name, last_name FROM customer;
$query = 'SELECT customer_id, first_name, last_name, phone FROM customer';
$stmt = $db->prepare($query);
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php

// SELECT type_of_service FROM service;
// $query1 = 'SELECT type_of_service FROM service';
// $stmt1 = $db->prepare($query);
// $stmt1->execute();
// $services = $stmt1->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>Acme Enterprises</title>
    </head>

    <link href="css/bootstrap.css" rel="stylesheet">

    <body>
        <h1>This is test for Acme Enterprises</h1>

        <?php
        
            echo "<table>";
            echo "<tr><th>First Name</th><th> Last Name </th><th> Phone Number </th>";

            foreach ($customers as $customer )
            {
                /*
                $customer_id =$customer ['customer_id'];
                $first_name = $customer['first_name'];
                $last_name = $customer['last_name'];
                $phone = $customer['phone'];

                echo "<li><p> $first_name - $last_name - $phone </p></li>";
                */

                 $first_name = $customer['first_name'];
               
                 $last_name = $customer['last_name'];
                
                 $phone = $customer['phone'];
                
                 echo " $first_name - $last_name - $phone ";

            }
            

            /*
            echo "<table>";
            echo "<tr><th>First Name</th><th> Last Name </th><th> Phone Number </th>";
            
            while ($customers = $stmt->fetchAll(PDO::FETCH_ASSOC))
            {
                echo "<tr><td>";
                echo $first_name = $customers['first_name'];
                echo "<tr><td>";
                echo $last_name = $customers['last_name'];
                echo "<tr><td>";
                echo  $phone = $customers['phone'];
                echo "<tr><td>";
            }
            */
        ?>

        
        
        

        <br/>

        <a href="logout.php?logout" <button class="btn btn-success mt-3 " name="Logout">Logout</button> </a>


           

    </body>
</html>