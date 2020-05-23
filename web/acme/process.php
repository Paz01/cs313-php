
<?php 
require_once('dbConnect.php');
$db = get_db();

session_start();
    if(isset($_POST['Login']))
    {
       echo 'is working';
    }
    else
    {
        echo 'Not Working Now Guys';
    }

?>