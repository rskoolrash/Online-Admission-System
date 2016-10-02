<?php
function GetComboOptions($qry,$vl)
{
    $con=mysqli_connect("localhost","root","","oas");
    $ra = mysqli_query($con, $qry);
$RETSTR = "<option value=''>Select one...</option>";
while($r = mysqli_fetch_array($rs)) 
{
    if($r[0]==$vl)
        $RETSTR .= "<option value='$r[0]' selected>$r[0]</option>";
    else
        $RETSTR .= "<option value='$r[0]'>$r[0]</option>";
}
return $RETSTR;
}

?>