
<link href="css/bootstrap.css" rel="stylesheet">

<?php
    session_start(); // if session starts on top before <?php the login stops working
 
    if(isset($_SESSION['User']))
    {
        echo ' Welcome ' . $_SESSION['User']. ':'. '<br/>';
        echo '<br/>';
                       
        echo 'We are thrilled that you are part of Acme Enterprises. ';
        echo 'This is your main landing page where you will be updating a series of activities, your primary role ' ; 
        echo 'is to update the activity of customer orders, their information and track their orders ';
        echo 'If you have any questions please contact your manager in charge. ';

        echo '<br/>';
        echo '<br/>';
        echo 'Click on the links below to continue';

        echo '<br/>';
             

        echo '<a href="job.php?Job Control Panel" <button class="btn btn-success mt-3 " name="Job Control Panel">Job Control Panel</button></a>';

        echo '<a href="acme.php?Control Panel" <button class="btn btn-success mt-3 " name="Customer Control Panel">Customer Control Panel</button></a>';
        
        echo '<a href="logout.php?logout" <button class="btn btn-primary mt-3 " name="Logout">Logout</button></a>';
    }
    else
    {
        header("location:index.php");
    }
 
    
    

?>