<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost","root","","oas");
if(!isset($con))
{
    die("Database Not Found");
}

  
  
if(isset($_REQUEST["a_sub"]))
{
    
 $aid=$_POST['a_id'];
 $apwd=$_POST['a_ps'];
 if($aid!=''&&$apwd!='')
 {
   $query=mysqli_query($con ,"select * from t_admin where ad_id='".$aid."' and ad_pswd='".$apwd."'");
   $res=mysqli_fetch_row($query);
   if($res)
   {
    $_SESSION['ad']=$aid;
    header('location:admin.php');
   }
   else
   {
     echo '<script>';
    echo 'alert("Invalid Login ! Please try again.")';
    echo '</script>';

   }
 }
 else
 {
     echo '<script>';
    echo 'alert("Enter both username and password")';
    echo '</script>';
 
 }
}



?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/login.css"></link>
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
        <script language="javascript" type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
        <script language="javascript" type="text/javascript" src="jquery/jquery-ui.js"></script>
        <link href="jquery/jquery-ui.css" rel="stylesheet" type="text/css" />

        <title></title>
        
        
        
    </head>
    <body style="background-image:url('./images/inbg.jpg');">
                <form id="adminlogin" action="adminlogin.php" method="post">
            
                    
                                
                           
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img>
                  </div>
                 </div>    
             </div>  
        
            
            
                <div  id="adivtop">
                    
                        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
                           <div class="container-fluid">    
                                    <div class="row">
                                      <div class="col-sm-12">
                                          <h3>Login</h3>
                                           <input type="text" id="a_id" name="a_id" class="form-control" style="width:200px;" placeholder="Admin ID"><br><br>
                                            <input type="password" id="a_ps" name="a_ps" class="form-control" style="width:200px;" placeholder="Password"><br><br>
                                            <input type="submit" id="a_sub" name="a_sub" value="Login" class="toggle btn btn-primary"><br>
                                      </div>
                                        
                                       
                                     </div>
                           </div>
                                
                              
                            </div>
                        
                    
                     <input type="hidden" id="txtid"  name="txtid" ><br/>
        </form>  

    </body>
</html>




























