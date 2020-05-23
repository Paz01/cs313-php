<?php
    session_start();
 
    if(isset($_SESSION['User']))
    {
        echo ' Welcome ' . $_SESSION['User'].'<br/>';
        
        echo '<a href = "acme.php">Acme Control Panel</a><br/>';

        echo '<br/>';
        //echo "Otherw"

        echo '<a href="logout.php?logout">Logout</a>';
    }
    else
    {
        header("location:index.php");
    }
 
?>