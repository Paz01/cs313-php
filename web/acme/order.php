<?php 
/*
require_once('dbConnect.php');
$db = get_db();

$info = null;
// insert a new Record
if(!empty($_POST) && empty($_GET))
{
    $first = $_POST['first'];
    $last = $_POST['last'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query = "INSERT INTO customer (first_Name, last_Name, phone, email) 
              VALUES ('$first', '$last', '$phone', '$email');";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->fetchALL(PDO::FETCH_ASSOC); 
}
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

$query = 'SELECT first_Name FROM customer';
$stmt = $db->prepare($query);
$stmt->execute();
 //print_r($stmt); // only for debugging purposes to see what we are fetching.
//$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($rows); // only for debugging purposes to see what we are fetching.
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
                    <?php if (!empty($_GET)): ?>
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
                            <select class="form-control" id="Customer">
                                <?php 
                               /* if ($rows)
                                {
                                   // print_r($rows);
                                  while ($row=$rows)
                                   {
                                     $cust_name = $row["$first_Name"];
                                    echo "<option>$cust_name<br></option>";  
                                    }
                                }    */                             
                                ?>
                            </select>
                        </div> 
                        
                        <div class="form-group">
                        <label for="Service">Service (select one):</label>
                            <select class="form-control" id="Service">
                                <option>1</option>
                            </select>
                        </div> 
                        
                        <!-- 
                        </div>

                        <div class="form-group">
                        <label for="Phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" value = "<?php //echo $info [0]['phone']?>"
                                placeholder = "Enter Phone Number" name = "phone" required>
                        
                        </div>

                        <div class="form-group">
                        <label for="E-mail">E-mail:</label>
                        <input type="text" class="form-control" id="email" value = "<?php //echo $info [0]['email']?>"
                                placeholder = "Enter E-mail Address" name = "email" required>
                        
                        </div>
                        -->
                                 
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </table>
        </div>
        
    </body>
</html>