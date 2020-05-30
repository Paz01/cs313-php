
<?php 
require_once('dbConnect.php');
$db = get_db();

$info = null;

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
// actualizar un record 
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
      <title>Customers </title>
    </head>
    <body>

    <form action="customer.php" method="POST">
  
     <input value = "<?php echo $info [0]->first_name?> "type ="text" name ="first" placeholder = "First Name">
     <br>
     <input type ="text" name ="last" placeholder = "Last Name">
     <br>
     <input type ="text" name ="phone" placeholder = "Phone">
     <br>
     <input type ="text" name ="email" placeholder = "E-mail">
     <br>
     <button type = "Insert" name = "Insert"> Insert </button>
     
    </form>

        
    </body>
</html>