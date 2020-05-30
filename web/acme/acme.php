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

    <body style="background:#CCC;">
      <br>
        <div class="container">
            <h3 class="text-center py-3">Control Panel - Acme Enterprises</h3>
            <a href="customer.php" <button class="btn btn-primary mt-3 " name="Logout"> <div class="float-right">Create customer</div></button> </a>
                <br>
                    <table class ="table table-hover">
                    
                                <thead class ="thead-dark">
                                    <tr>
                                        <th>Record</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
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

            <a href="logout.php?logout" <button class="btn btn-success mt-3 " name="Logout">Logout</button> </a>

        </div>
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

       
          

    </body>
</html>