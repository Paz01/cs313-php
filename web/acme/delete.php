
<?php
require_once('dbConnect.php');
$db = get_db();

    if(!empty($_GET))
    {
        $record_id = $_GET ['record'];
        //print_r($record_id);

        $query = "DELETE FROM customer WHERE customer_id = $record_id;";

        $stmt = $db->prepare($query);
        $stmt->execute();
        $stmt->fetchALL(PDO::FETCH_ASSOC); 

        $is_deleted = true;

        if($is_deleted)
        {
            echo "Your record has been deleted";
        }
        else
        {
            echo "Can not delete record";
        }
    }
     
?>

<!-- <!DOCTYPE html>
<head>
  <title>Delete</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!--<link href="css/bootstrap.css" rel="stylesheet"> -->


  <!-- <body style="background:#CCC;">

        <br/>        
        <a href="job.php?Job Control Panel" <button class="btn btn-success mt-3 " name="Job Control Panel">Job Control Panel</button></a>
        <br/>
        <a href="acme.php?Customer Control Panel" <button class="btn btn-success mt-3 " name="Customer Control Panel">Customer Control Panel</button></a>
        </body>
</html> -->