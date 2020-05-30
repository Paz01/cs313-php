<?php
require ('dbConnect.php');
$db = get_db();

session_start();

// SELECT customer_id, first_name, last_name FROM customer;
$query = 'SELECT customer_id, first_name, last_name, phone FROM customer';
$stmt = $db->prepare($query);
$stmt->execute();
//$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <title>Acme Enterprises</title>
    </head>

    <link href="css/bootstrap.css" rel="stylesheet">

    <body>
        <h3>These are the customers of Acme Enterprises</h3>
        <br>
        <br>

        <table>
                <thead>
                    <tr>
                        <th>
                            Record
                        </th>
                        <th>
                            firstName
                        </th>
                        <th>
                            LastName
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Actions 
                        </th>
                    </tr>
                </thead>


        <tbody>
            <?php if (is_array($rows)):
                    $i=1;
                    foreach($rows as $record):

            ?> 
            <tr>
                    <td>
                    <?php echo $i;  ?>
                    </td>
                    <td>
                    <?php echo $record['first_name']  ?>
                    </td>
                    <td>
                    <?php echo $record['last_name']  ?>
                    </td>
                    <td>
                    <?php echo $record['phone']  ?>
                    </td>
                    <td>
                          <a href = " "> Edit  </a>
                          <a href = " "> Delete </a>
                    </td>
                    
                    <?php $i++; ?>
            </tr>
                    <?php  endforeach;?>
                    <?php endif; ?>
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