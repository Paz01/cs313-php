<?php
    session_start();
 
    if(isset($_SESSION['User']))
    {
        echo ' Welcome ' . $_SESSION['User'].'<br/>';
        
        echo '<a href = "acme.php">Acme Control Panel</a><br/>';

        echo '<br/>';
        //echo "Otherw"

        //<button class="btn btn-success mt-3" name="Login">Login</button>

        //echo '<button class="btn btn-success mt-3" name="Login">Login</button>

        echo '<a href="logout.php?logout">Logout</a>';

        echo '<a href="logout.php" <button class="btn btn-success mt-3" name="Logout">Logout</button></a>';
              
       // <button class="btn btn-success mt-3" name="Logout">Logout</button>
        
        //<button class="btn btn-success mt-3" name="Login">Login</button>

    }
    else
    {
        header("location:index.php");
    }
 
?>