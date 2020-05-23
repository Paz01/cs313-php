session_start();

<!DOCTYPE html>

<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Welcome Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>

    <link href="css/bootstrap.css" rel="stylesheet">

    <body>
      
    <?php
    
 
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















        
    </body>
</html>