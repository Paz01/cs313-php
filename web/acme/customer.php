
<?php 
require_once('dbConnect.php');
$db = get_db();

$first = $_POST['first'];
$last = $_POST['last'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// INSERT INTO customer (first_Name, last_Name, phone, email) 
// VALUES ('John', 'Smith', '817-845-4574', 'Smith@gmail.com');

$query = "INSERT INTO customer (first_Name, last_Name, phone, email) 
           VALUES ('$first', '$last', '$phone', '$email');";

$stmt = $db->prepare($query);
$stmt->execute();
$stmt->fetchALL(PDO::FETCH_ASSOC); 


?>

<!DOCTYPE html>

    <head>
      <title>Customers </title>

    </head>
    <body>


    <form action="/action_page.php" method="POST">
     
     <input type ="text" name ="first" placeholder = "First Name">
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