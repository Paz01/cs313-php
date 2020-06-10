<?php

require_once('dbConnect.php');
$db = get_db();
$success_message = array(
    'result'  => false,
    'message' => ''
);

if(!empty($_GET)):
    $record_id = $_GET ['record'];

    $query = "
        DELETE FROM public.job
        WHERE job_id=$record_id;
    ";

    $stmt = $db->prepare($query);
    if ($stmt->execute()):
      $success_message['result'] = true;
      $success_message['message'] = 'Your record has been deleted';
    endif;
  
endif;
     
?>

 <!DOCTYPE html>
<head>
  <title>Delete</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <body style="background:#CCC;">

        <?php if ($success_message['result']): ?>
          <h1><?php echo $success_message['message']; ?></h1>
        <?php endif ?>
        <a href="job.php" class="btn btn-success mt-3 " name="Job Control Panel">Job Control Panel</button></a>
        <br/>
        <a href="acme.php" class="btn btn-success mt-3 " name="Customer Control Panel">Customer Control Panel</button></a>
    </body>
</html> 