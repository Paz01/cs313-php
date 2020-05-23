
<?php 
require_once('dbConnect.php');
$db = get_db();

session_start();
    if(isset($_POST['Login']))
    {
       if (empty($_POST['UName']) || empty($_POST['Password']))
       {
           header(" location:index.php ? Empty = Please enter your credentials");
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }

?>