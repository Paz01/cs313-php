<?php 
require_once('dbConnect.php');
$db = get_db();

$info = null;
// insert a Record
if(!empty($_POST))
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
// Update a Record
if(!empty($_GET))
{
    $record_id = $_GET['record'];
    $query = "SELECT * FROM customer WHERE customer_id = $record_id";
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $info = $stmt->fetchALL(PDO::FETCH_ASSOC); 
}
// INSERT INTO customer (first_Name, last_Name, phone, email) 
// VALUES ('John', 'Smith', '817-845-4574', 'Smith@gmail.com');
?>

<!DOCTYPE html>
<head>
  <title>Customers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!--<link href="css/bootstrap.css" rel="stylesheet"> -->

    <body>
        <div class="container">
            <h4 class="text-center py-3">Customer information</h4>
                <table class ="table">
                    
                    <form action="customer.php" method="POST">

                        <div class="form-group">
                        <label for="First Name">First Name:</label>
                        <input type="text" class="form-control" id="fname" input value = "<?php echo $info [0]->first_name?>"
                                placeholder = "Enter First Name" name = "first" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <div class="form-group">
                        <label for="Last Name">Last Name:</label>
                        <input type="text" class="form-control" id="lname" input value = " "
                                placeholder = "Enter Last Name" name = "last" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    
                    
                  <!--<input value = "<?php //echo $info [0]->first_name?>" type ="text" name ="first" placeholder = "First Name">-->
                  <!--<br>
                    <input                                               type ="text" name ="last" placeholder = "Last Name">
                    <br>
                    <input                                               type ="text" name ="phone" placeholder = "Phone">
                    <br>
                    <input                                               type ="text" name ="email" placeholder = "E-mail">
                    <br>
                    <button type = "Insert" name = "Insert"> Insert </button>-->
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </table>
        </div>
        
    </body>
</html>