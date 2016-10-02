
<?php
session_start();
$sp=mysqli_connect("localhost","root","","oas");
         if($sp->connect_errno){
                echo "Error <br/>".$sp->error;
}

$picpath="studentpic/";
$docpath="studentdoc/";
$proofpath="studentproof/";

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
    ('CUTM00001','$img','$img1','$img2','$img3','$img4','$img5','$img6')";
        if($sp->query($query)){
     echo "<br/>Inserted to DB also";    
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
/*if(isset($_POST['ftcdocup']))
{

$docpath=$docpath.$_FILES['ftcdoc']['name']; 
    
if(move_uploaded_file($_FILES['ftcdoc']['tmp_name'],$docpath))
{
echo " ".basename($_FILES['ftcdoc']['name'])." has been uploaded<br/>";
echo '<img src="studentdoc/'.$_FILES['ftcdoc']['name'].'" width="100" height="100"/>';
$img=$_FILES['ftcdoc']['name'];
    $query="update t_userdoc set s_tencerpic='$img'  WHERE s_id='CUTM00001'";
    if($sp->query($query)){
     echo "<br/>Inserted to DB also";    
    }else{
        echo "Error <br/>".$sp->error;        
    }
}
else
{
echo "There is an error,please retry or ckeck path";
}
}


if(isset($_POST['fdmdocup']))
{

$docpath=$docpath.$_FILES['fdmdoc']['name']; 
    
if(move_uploaded_file($_FILES['fdmdoc']['tmp_name'],$docpath))
{
echo " ".basename($_FILES['fdmdoc']['name'])." has been uploaded<br/>";
echo '<img src="studentdoc/'.$_FILES['fdmdoc']['name'].'" width="100" height="100"/>';
$img=$_FILES['fdmdoc']['name'];
    $query="update t_userdoc set s_twdmarkpic='$img'  WHERE s_id='CUTM00001'";
    if($sp->query($query)){
     echo "<br/>Inserted to DB also";    
    }else{
        echo "Error <br/>".$sp->error;        
    }
}
else
{
echo "There is an error,please retry or ckeck path";
}
}


if(isset($_POST['fdcdocup']))
{

$docpath=$docpath.$_FILES['fdcdoc']['name']; 
    
if(move_uploaded_file($_FILES['fdcdoc']['tmp_name'],$docpath))
{
echo " ".basename($_FILES['fdcdoc']['name'])." has been uploaded<br/>";
echo '<img src="studentdoc/'.$_FILES['fdcdoc']['name'].'" width="100" height="100"/>';
$img=$_FILES['fdcdoc']['name'];
    $query="update t_userdoc set s_twdcerpic='$img'  WHERE s_id='CUTM00001'";
    if($sp->query($query)){
     echo "<br/>Inserted to DB also";    
    }else{
        echo "Error <br/>".$sp->error;        
    }
}
else
{
echo "There is an error,please retry or ckeck path";
}
}


if(isset($_POST['fideup']))
{

$proofpath=$proofpath.$_FILES['fide']['name']; 
    
if(move_uploaded_file($_FILES['fide']['tmp_name'],$proofpath))
{
echo " ".basename($_FILES['fide']['name'])." has been uploaded<br/>";
echo '<img src="studentproof/'.$_FILES['fide']['name'].'" width="100" height="100"/>';
$img=$_FILES['fide']['name'];
    $query="update t_userdoc set s_idprfpic='$img'  WHERE s_id='CUTM00001'";
    if($sp->query($query)){
     echo "<br/>Inserted to DB also";    
    }else{
        echo "Error <br/>".$sp->error;        
    }
}
else
{
echo "There is an error,please retry or ckeck path";
}
}
if(isset($_POST['fsigup']))
{

$proofpath=$proofpath.$_FILES['fsig']['name']; 
    
if(move_uploaded_file($_FILES['fsig']['tmp_name'],$proofpath))
{
echo " ".basename($_FILES['fsig']['name'])." has been uploaded<br/>";
echo '<img src="studentproof/'.$_FILES['fsig']['name'].'" width="100" height="100"/>';
$img=$_FILES['fsig']['name'];
    $query="update t_userdoc set s_sigpic='$img'  WHERE s_id='CUTM00001'";
    if($sp->query($query)){
     echo "<br/>Inserted to DB also";    
    }else{
        echo "Error <br/>".$sp->error;        
    }
}
else
{
echo "There is an error,please retry or ckeck path";
}
}
*/
 ?>
