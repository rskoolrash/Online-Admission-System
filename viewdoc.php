<?php
    error_reporting(0);

$con=mysqli_connect("localhost","root","","oas");
if(!isset($con))
{
    die("Database Not Found");
}

if(isset($_REQUEST["vfrm"]))
{
    header('location:viewform.php');
}

$getid= $_GET["id"];
       
$data = mysqli_query($con,"SELECT * FROM t_userdoc ") or
die(mysqli_error());

$picfile_path ='studentpic/';

$docfile_path ='studentdoc/';

$prooffile_path ='studentproof/';


?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
        
         <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
    </head>
     <body style="background-image:url('./images/inbg.jpg');">
        <form id="vidoc" action="viewdoc.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img>
                  </div>
                 </div>    
             </div><br>
                <div  class="container-fluid">  
                
                
                
                </div>
         
             <div  class="container-fluid">  
                
                 <div class="row">
                    <div class="col-sm-12" style="height:933px;box-shadow: 1px 5px 14px #999999;">
                      <?php
                    
                    $result1 = mysqli_query($con,"SELECT * FROM t_userdoc where s_id='$getid'");
                        
                    echo '<table class="table table-hover">';
                    echo '<tbody>';
                    while($row = mysqli_fetch_array($result1))
                      {
                        echo '<tr><td colspan=2><center><h4><i>Documents</i></h4></center></td><tr>';                        
                        
                        $picsrc=$picfile_path.$row['s_pic'];
                        echo '<tr><td>Student`s Pic</td>';
                        echo "<td><img src='$picsrc.' width='150px' height='150px'></td></tr>";
                        
                        $docsrc1=$docfile_path.$row['s_tenmarkpic'];
                        echo '<tr><td>10th Mark Sheet</td>';
                        echo "<td><a href='$docsrc1.' width='300px' height='300px'> View </a></td></tr>";
                        
                        $docsrc2=$docfile_path.$row['s_tencerpic'];
                        echo '<tr><td>10th Certificate</td>';
                        echo "<td><a href='$docsrc2.' width='300px' height='300px'> View </a></td></tr>";
                        
                        
                        $docsrc3=$docfile_path.$row['s_twdmarkpic'];
                        echo '<tr><td>12th/Diploma Mark Sheet</td>';
                        echo "<td><a href='$docsrc3.' width='300px' height='300px'> View </a></td></tr>";
                        
                        $docsrc4=$docfile_path.$row['s_twdcerpic'];
                        echo '<tr><td>12th/Diploma Certificate</td>';
                        echo "<td><a href='$docsrc4.' width='300px' height='300px'> View </a></td></tr>";
                        
                        $proofsrc1=$prooffile_path.$row['s_idprfpic'];
                        echo '<tr><td>Identity Proof</td>';
                        echo "<td><a href='$proofsrc1.' width='300px' height='300px'> View </a></td></tr>";
                        
                        $proofsrc2=$prooffile_path.$row['s_sigpic'];
                        echo '<tr><td>Signature</td>';
                        echo "<td><a href='$proofsrc2.' width='300px' height='300px'> View </a></td></tr>";
                        
                      }
                    echo '</tbody>';
                    echo '</table>';
                ?>
                
                         <center><input type="submit" value="Back" name="vfrm" class="toggle btn btn-primary"></center>                           
                         
                        </div>
                    </div>
                 </div>
             
                  </form>
            </body>
</html>
