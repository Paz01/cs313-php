
<?php 
require_once('dbConnect.php');
$db = get_db();

session_start();

    if(isset($_POST['Login']))
    {
       if (empty($_POST['UName']) || empty($_POST['Password']))
       {
           header ("location:index.php?Empty=Please enter your credentials");
       }
       else
       {
        $query = "SELECT * FROM employee WHERE e_user_name ='".$_POST['UName']."' AND e_password='".$_POST['Password']."'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $employees = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        if ($employees = true)
        {
            $_SESSION['User']=$_POST['UName'];
            header("location:welcome.php");
        }
        else
        {
            header("location:index.php?Invalid=Please enter good credentials");
        }

       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }

?>