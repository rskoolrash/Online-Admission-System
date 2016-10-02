<?php

    session_start();
    error_reporting(0);

$con=mysqli_connect("localhost","root","","oas");
$q=mysqli_query($con,"select s_mark from t_usermark where s_id='".$_SESSION['user']."'");
$n=  mysqli_fetch_assoc($q);
$stmrk= $n['s_mark'];

$id=$_SESSION['user'];

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
    </head>
    <body style="background-image:url('./images/inbg.jpg');">
        <form id=vires" action="viewresult.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img>
                  </div>
                 </div>    
             </div><br>
             
              <div class="container">
                        <center> <div class="jumbotron" style="width:50%; box-shadow: -3px 3px 10px #999999;   margin-top:10px;">
                             <div class="row">
                                <div class="col-sm-12">  
                                     
                                    <p>Your Marks Obtained are <?php echo $stmrk ?></p>      
                                        
                               </div>
                         </div>
                     </div>
                </div>
        </form>
    </body>
</html>
