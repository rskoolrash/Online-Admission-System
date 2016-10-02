
<?php
session_start();
$sp=mysqli_connect("localhost","root","","oas");
         if($sp->connect_errno){
                echo "Error <br/>".$sp->error;
}

$picpath="studentpic/";
$docpath="studentdoc/";
$proofpath="studentproof/";
$id=$_SESSION['user'];
if(isset($_POST['fpicup']))
{
$picpath=$picpath.$_FILES['fpic']['name'];
$docpath1=$docpath.$_FILES['ftndoc']['name'];     
$docpath2=$docpath.$_FILES['ftcdoc']['name']; 
$docpath3=$docpath.$_FILES['fdmdoc']['name']; 
$docpath4=$docpath.$_FILES['fdcdoc']['name'];     
$proofpath1=$proofpath.$_FILES['fide']['name']; 
$proofpath2=$proofpath.$_FILES['fsig']['name']; 

if(move_uploaded_file($_FILES['fpic']['tmp_name'],$picpath)
  && move_uploaded_file($_FILES['ftndoc']['tmp_name'],$docpath1)
  && move_uploaded_file($_FILES['ftcdoc']['tmp_name'],$docpath2)
  && move_uploaded_file($_FILES['fdmdoc']['tmp_name'],$docpath3)
  && move_uploaded_file($_FILES['fdcdoc']['tmp_name'],$docpath4)
  && move_uploaded_file($_FILES['fide']['tmp_name'],$proofpath1)
  && move_uploaded_file($_FILES['fsig']['tmp_name'],$proofpath2))
{

$img=$_FILES['fpic']['name'];
$img1=$_FILES['ftndoc']['name'];
$img2=$_FILES['ftcdoc']['name'];
$img3=$_FILES['fdmdoc']['name'];
$img4=$_FILES['fdcdoc']['name'];
$img5=$_FILES['fide']['name'];
$img6=$_FILES['fsig']['name'];


$query="insert into t_userdoc (s_id,s_pic,s_tenmarkpic,s_tencerpic,
    s_twdmarkpic, s_twdcerpic, s_idprfpic, s_sigpic) values 
    ('$id','$img','$img1','$img2','$img3','$img4','$img5','$img6')";
        if($sp->query($query)){
     echo "Inserted to DB ";    
    }else
    {
        echo "Error <br/>".$sp->error;        
    }
}
else
{
echo "There is an error,please retry or ckeck path";
}
}
 ?>
