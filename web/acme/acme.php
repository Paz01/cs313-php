<?php
require ('dbConnect.php');
$db = get_db();

session_start();

// SELECT customer_id, first_name, last_name FROM customer;
$query = 'SELECT customer_id, first_name, last_name, phone, email FROM customer';
$stmt = $db->prepare($query);
$stmt->execute();
//$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>Acme Enterprises</title>
    </head>

    <link href="css/bootstrap.css" rel="stylesheet">

    <body>
        <h3>These are the customers of Acme Enterprises</h3>
        <br>
        

        <table class ="table">
                    <thead>
                        <tr>
                            <th>Record</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
            <tbody>
                     <?php if (is_array($rows)):
                              $i=1;
                            foreach($rows as $record):

                     ?> 
                        <tr>
                            <td> <?php echo $i;?> </td>
                            <td> <?php echo $record['first_name'] ?> </td>
                            <td> <?php echo $record['last_name']  ?> </td>
                            <td> <?php echo $record['phone']      ?> </td>
                            <td> <?php echo $record['email']      ?> </td>
                            <td>
                                 <?php $id = $record['customer_id'] ?>
                                 
                                 <a href = " <?php echo "customer.php?record=$id"?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                 <a href = "                                       "><button type="button" class="btn btn-danger ">Delete</button> </a>
                            </td>
                            
                                <?php $i++; ?>
                        </tr>
                                <?php  endforeach;?>
                                <?php       endif;?>
            </tbody>

        </table>
       
        <?php
         /*            

            foreach ($rows as $row)
            {
                echo "<p>" . "First Name: " . $row['first_name'] . "</P>" .
                     "<p>" . "Last Name: " . $row['last_name'] . "</p>" . 
                     "<p>" . "Phone: " . $row['phone'] . "</p>";
                echo "----------------------------";
            }
            */
        ?>
              

        <br/>

        <a href="logout.php?logout" <button class="btn btn-success mt-3 " name="Logout">Logout</button> </a>
          

    </body>
</html>