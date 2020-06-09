<?php 

require_once('dbConnect.php');
$db = get_db();

$info = null;
// insert a new Record
if(!empty($_POST) && empty($_GET))
{
    print_r($_POST);
    
    $notes = $_POST['notes'];
    $price = (float)$_POST['price'];
    $customer_name = (int)$_POST['customer_name'];
    $service_name = (int)$_POST['service_name'];
    $employee_name = (int)$_POST['employee_name'];
    
    //INSERT INTO job (notes, price, customer_id, service_id, employee_id) VALUES ('The job went smooth', '75.00',1,1,1);
    $query = "INSERT INTO job (notes, price, customer_id, service_id employee_id) 
              VALUES ('$notes', '$price', $customer_name, $service_name, $employee_name);";

    $stmt = $db->prepare($query);
    
    $stmt->execute();

    print_r($db->errorInfo());

    $stmt->fetchALL(PDO::FETCH_ASSOC); 
    /*
    if ($stmt->execute())
    {
        echo "Query ejecutado exitosamente";
        
    }
    else{
        echo "Error al ejecutar el query";
    }
    
    */
}
/*
// Look up a record
elseif(!empty($_GET) && empty($_POST))
{
    $record_id = $_GET['record'];
    $query = "SELECT * FROM customer WHERE customer_id = $record_id";
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $info = $stmt->fetchALL(PDO::FETCH_ASSOC); 
}
// INSERT INTO customer (first_Name, last_Name, phone, email) 
// VALUES ('John', 'Smith', '817-845-4574', 'Smith@gmail.com');
// Update an existing record. 

elseif(!empty($_GET) && !empty($_POST))
{
    $first = $_POST['first'];
    $last = $_POST['last'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $record_id = $_GET['record'];
    $query ="UPDATE customer SET first_name='$first', last_name='$last', phone='$phone', email='$email'
                WHERE customer_id=$record_id;";
    
    //UPDATE customer SET first_name= 'James' WHERE customer_id=7;

    $stmt = $db->prepare($query);
    
    $test = $stmt->execute();
    $info = $stmt->fetchALL(PDO::FETCH_ASSOC); 
}
*/
?> 

<?php 
require_once('dbConnect.php');
$db = get_db();

$query = 'SELECT first_Name, customer_id FROM customer';
$stmt = $db->prepare($query);
$stmt->execute();
 //print_r($stmt); // only for debugging purposes to see what we are fetching.
//$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($rows); // only for debugging purposes to see what we are fetching.

$query = 'SELECT service_id, type_of_service FROM service';
$stmt1 = $db->prepare($query);
$stmt1->execute();
$rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$query = 'SELECT employee_id, e_user_name FROM employee';
$stmt2 = $db->prepare($query);
$stmt2->execute();
$rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<head>
  <title>Job Orders</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!--<link href="css/bootstrap.css" rel="stylesheet"> -->

    <body style="background:#CCC;">
        <div class="container">
            <h4 class="text-center py-3">Job Order Information

            <a href="job.php" class="btn btn-success mt-3 float-right" name="Control">Back to Job Control Panel </a> </h4>
              <!-- <pre> <?php //print_r($test); ?> </pre> --> <!--for debugging purposes only-->
               
                <table class ="table">
                    <?php if (!empty($_GET)): ?>              <!-- solo para editar -->
                    <form action='<?php echo "order.php?record=$record_id" ?>' method="POST">
                    <?php else: ?>
                    <form action='<?php echo "order.php" ?>' method="POST">
                    <?php endif; ?>

                        <div class="form-group">
                            <label for="Notes">Notes:</label>
                                <input type="text" class="form-control" id="note" value = "<?php //echo $info [0]['first_name'] ?>"
                                        placeholder = "Enter notes about the job" name = "notes" required>
                        </div>

                        <div class="form-group">
                            <label for="Price">Price:</label>
                                <input type="text" class="form-control" id="price" value = "<?php //echo $info [0]['last_name']?>"
                                        placeholder = "Enter the price" name = "price" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="Customer">Customer (select one):</label>
                                <select class="form-control" id="Customer" name ="customer_name">
                                    <!-- // print_r($rows); -->
                                    <?php 
                                // print_r($rows); for debugiing purposes only
                                    foreach ($rows as $key => $data):                                                
                                    ?>
                                    <option value = "<?php echo $data ['customer_id'] ?>"> <?php echo $data ['first_name'] ?> </option>
                                    <?php endforeach;?>
                                </select>
                        </div> 
                        
                        <div class="form-group">
                            <label for="Customer">Service (select one):</label>
                                <select class="form-control" id="Service" name ="service_name">
                                    <!-- // print_r($rows); -->
                                    <?php 
                                    //print_r($rows);
                                    foreach ($rows1 as $key => $data):                                                
                                    ?>
                                    <option value = "<?php echo $data ['service_id'] ?>"> <?php echo $data ['type_of_service'] ?> </option>
                                    <?php endforeach;?>
                                </select>
                        </div> 

                        <div class="form-group">
                            <label for="Employee">Employee (select one):</label>
                                <select class="form-control" id="Employee" name ="employee_name">
                                    <!-- // print_r($rows); -->
                                    <?php 
                                    //print_r($rows);
                                    foreach ($rows2 as $key => $data):                                                
                                    ?>
                                    <option value = "<?php echo $data ['employee_id'] ?>"> <?php echo $data ['e_user_name'] ?> </option>
                                    <?php endforeach;?>
                                </select>
                        </div>
                                                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </table>
        </div>
        
    </body>
</html>