<?php
require ('dbConnect.php');
$db = get_db();

session_start();
// SELECT * FROM JOB ORDER BY price DESC LIMIT 10;
// SELECT customer_id, first_name, last_name FROM customer;
$query = 'SELECT job.notes, job.price, customer.first_Name, customer.last_Name, service.type_of_service, employee.e_user_name AS employee_name 
          FROM job INNER JOIN customer ON customer.customer_id = job.customer_id 
          INNER JOIN employee ON employee.employee_id = job.employee_id 
          INNER JOIN service ON service.service_id = job.service_id';
//$query = 'SELECT job_id, notes, price, customer_id, service_id, employee_id FROM job';
$stmt = $db->prepare($query);
$stmt->execute();
//$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<script>
 function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");

      // onclick='confirmationDelete(this);return false;'  //-->> We use this line to insert the call on the href click below
}
</script>


<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>Acme Enterprises</title>
    </head>

    <link href="css/bootstrap.css" rel="stylesheet">

    <body style="background:#CCC;">
      <br>
        <div class="container">
            <h3 class="text-center py-3">Job Control Panel - Acme Enterprises
            <a href="order.php" <button class="btn btn-primary mt-3 float-right" name="Create">Create new Job order </button> </a> </h3>
                <br>
                    <table class ="table table-hover">
                    
                                <thead class ="thead-dark">
                                    <tr>
                                        <th>Record</th>
                                        <th>Notes</th>
                                        <th>Price</th>
                                        <th>Customer First</th>
                                        <th>Customer Last</th>
                                        <th>Service</th>
                                        <th>Employee</th>
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
                                        <td> <?php echo $record['notes']      ?> </td>
                                        <td> <?php echo $record['price']      ?> </td>
                                        <td> <?php echo $record['first_Name']?> </td>
                                        <td> <?php echo $record['last_Name']?> </td>
                                        <td> <?php echo $record['type_of_service'] ?> </td>
                                        <td> <?php echo $record['e_user_name ']?> </td>
                                        <td>
                                            <?php $id = $record['job_id'] ?>
                                            
                                            <a href = " <?php echo "order.php?record=$id"?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                            <a onclick='confirmationDelete(this);return false;' href = " <?php echo "delete.php?record=$id"?>">  <button type="button" class="btn btn-danger ">Delete</button> </a>
                                        </td>
                                            <?php $i++; ?>
                                    </tr>
                                            <?php  endforeach;?>
                                            <?php       endif;?>
                        </tbody>

                    </table>

            <a href="logout.php?logout" <button class="btn btn-success mt-3 " name="Logout">Logout</button> </a>
            <br>
            <a href="welcome.php?welcome" <button class="btn btn-primary mt-3"name="Logout">Home</button></a> 

        </div>
        <?php
         
        ?>
              

        <br/>

        
          

    </body>
</html>