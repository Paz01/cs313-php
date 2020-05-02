<!DOCTYPE HTML>
<html>
<head>
    <title>CSE 341 - Web Backend Development</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
                                                           <!-- this line below will prevent the browser to be cached the css -->
     <link rel="stylesheet" type="text/css" href="style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" />
</head>
<body>
    <div class="page-container">
        <header>
            <h1>CSE 341 - Web Backend Development</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="assignments.php">Assignments</a></li>
                <!-- <li><a href="#news">News</a></li> 
                <li><a href="#contactUs">Contact Us</a></li>               
                <li class="menu-right"><a href="#search">Search</a></li>
                <li class="menu-right"><a href="#login">Login</a></li> -->
            </ul>
        </nav>
        <main>
            <div class="column1">
                <figure>
                    <img src="img\wash_hands.jpg" alt="Wash hands">
                </figure>

                <h3>Wash hands</h3>
                <p>During this pandemic, we can all do our part and prevent the virus from spreading. Always wash your hands frequently.</p>
                <p>Clean hands can save you and save me. We are in this together.</p>
            </div>

            <div class="column2">
                <h2>Main Assignments</h2>
                   <p>This page is under construction, you will see here cool stuff.  
                    </p>
                <ol>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    <li>Links for assignments will be here </li>
                    
                </ol>
                <p> Thank you for stopping by.</p>
            </div>

            <div class="column3">
                <figure>
                <img src="img\face_mask.jpg" alt="face mask">
                </figure>
               
                <h3>Wear a mask</h3>
                  <p> Wear a mask and help us stay safe. Wearing a mask can go a long way in spreading the virus. </p>
                  <p> Wearing a mask can save you and save me. We are in this together.</p>
             </div>
        </main>
        <footer>
            <p>&copy; 2020 &bull;&bull; CSE 341 - BYUI &bull;&bull; <?php echo "Today is " . date("Y/m/d"); echo " - "; echo "The time is " . date("h:i:sa") ?> &bull;&bull; All Rights Reserved</p>
        </footer>
    </div>
</body>
</html>