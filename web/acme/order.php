<?php 

require_once('dbConnect.php');
$db = get_db();

$info = null;

$success_message = array(
    'result'  => false,
    'message' => ''
);

// insert a new Record
if(!empty($_POST) && empty($_GET)){
    $notes         = $_POST['notes'];
    $price         = (float)$_POST['price'];
    $customer_name = (int)$_POST['customer_name'];
    $service_name  = (int)$_POST['service_name'];
    $employee_name = (int)$_POST['employee_name'];
    
    $query = "INSERT INTO public.job (notes, price, customer_id, service_id, employee_id) VALUES('$notes', $price, $customer_name, $service_name, $employee_name);";
    $stmt4 = $db->prepare($query);    
    #$stmt4->execute();
    if ($stmt4->execute()):
        $success_message['result']  = true;
        $success_message['message'] = "You have added a new record";
    endif;

}elseif(!empty($_GET) && empty($_POST)){
    $record_id = $_GET['record'];
    $query     = "SELECT * FROM job WHERE job_id = $record_id";
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $info = $stmt->fetchALL(PDO::FETCH_ASSOC);

}elseif(!empty($_GET) && !empty($_POST)){
    
    $notes         = $_POST['notes'];
    $price         = (float)$_POST['price'];
    $customer_name = (int)$_POST['customer_name'];
    $service_name  = (int)$_POST['service_name'];
    $employee_name = (int)$_POST['employee_name'];

    $record_id = $_GET['record'];
    # investigar que son los schemas en base de datos con PostgreSQL
    $query ="
        UPDATE public.job
        SET notes='$notes', price=$price, customer_id=$customer_name, service_id=$service_name, employee_id=$employee_name
        WHERE job_id=$record_id;
        ";
    
    $stmt = $db->prepare($query);
    
    if ($stmt->execute()): #verifico si se ejecuto el query
        $success_message['result']  = true;
        $success_message['message'] = "You have edited the record";
    endif;

    $info = $stmt->fetchALL(PDO::FETCH_ASSOC); 
    $record_id = $_GET['record'];
    $query     = "SELECT * FROM job WHERE job_id = $record_id";
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $info = $stmt->fetchALL(PDO::FETCH_ASSOC);
}

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
              <!-- <pre> <?php #print_r($info); ?> </pre> --> <!--for debugging purposes only-->
               <?php if ($success_message['result'] == true): ?>
                   <h1><?php echo $success_message['message']; ?></h1>
               <?php endif ?>
                <table class ="table">
                    <?php if (!empty($_GET)): ?>              <!-- solo para editar -->
                        <form action='<?php echo "order.php?record=$record_id" ?>' method="POST">
                    <?php else: ?>
                        <form action='<?php echo "order.php" ?>' method="POST">
                    <?php endif; ?>

                        <div class="form-group">
                            <label for="Notes">Notes:</label>
                                <input type="text" class="form-control" id="note" value = "<?php echo $info[0]['notes'] ?>"
                                        placeholder = "Enter notes about the job" name = "notes" required>
                        </div>

                        <div class="form-group">
                            <label for="Price">Price:</label>
                                <input type="text" class="form-control" id="price" value = "<?php echo $info [0]['price']?>"
                                        placeholder = "Enter the price" name = "price" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="Customer">Customer (select one):</label>
                                <select class="form-control" id="Customer" name ="customer_name">
                                    <?php  foreach ($rows as $key => $data):?>
                                        <?php if ($data['customer_id'] == $info[0]['customer_id']): ?>
                                            <option value = "<?php echo $data ['customer_id'] ?>" selected> <?php echo $data ['first_name'] ?> </option>
                                        <?php else: ?>
                                            <option value = "<?php echo $data ['customer_id'] ?>"> <?php echo $data ['first_name'] ?> </option>
                                        <?php endif ?>
                                    <?php endforeach;?>
                                </select>
                        </div> 
                        
                        <div class="form-group">
                            <label for="Customer">Service (select one):</label>
                                <select class="form-control" id="Service" name ="service_name">
                                    <?php  foreach ($rows1 as $key => $data):?>
                                        <?php if ($data ['service_id'] == $info[0]['service_id']): ?>
                                            <option value = "<?php echo $data ['service_id'] ?>" selected> <?php echo $data ['type_of_service'] ?> </option>
                                        <?php else: ?>
                                            <option value = "<?php echo $data ['service_id'] ?>"> <?php echo $data ['type_of_service'] ?> </option>
                                        <?php endif ?>
                                    <?php endforeach;?>
                                </select>
                        </div> 

                        <div class="form-group">
                            <label for="Employee">Employee (select one):</label>
                                <select class="form-control" id="Employee" name ="employee_name">
                                    <?php  foreach ($rows2 as $key => $data):?>
                                        <?php if ($data['employee_id'] == $info[0]['employee_id']): ?>
                                            <option value = "<?php echo $data ['employee_id'] ?>" selected> <?php echo $data ['e_user_name'] ?> </option>
                                        <?php else: ?>
                                            <option value = "<?php echo $data ['employee_id'] ?>"> <?php echo $data ['e_user_name'] ?> </option>    
                                        <?php endif ?>
                                        
                                    <?php endforeach;?>
                                </select>
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </table>
        </div>
        
    </body>
</html>