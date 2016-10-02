<?php 
error_reporting(0);

session_start();

function GetConnection()
{
    $con = mysqli_connect("localhost", "root", "123", "vts");
    //$con = mysqli_connect("localhost","medicine", "NWR928bwpS", "medicine_main");
    return $con;
}


function CheckPhoneNo($PHNO)
{
    $rs = GetRecordSet("select cst_phone from t_customer where cst_phone = $PHNO");
    if(mysqli_num_rows($rs)>0)
    {
        return "1";
    }
    else
    {
        return "0";
    }
}



function GetComboOptions($qry,$vl)
{
$rs = GetRecordSet($qry);
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


function GetScreenDesc($pgnm)
{
    $rs = GetRecordSet("select description from t_page_permission where page = '$pgnm'");
    return mysqli_fetch_array($rs)[0];
}

function ShowScreenAuthError($pgnm)
{
   header("location:" . $pgnm . "?emsg=You Are Not Authorised To Use Given Screen Please Contact System Administratr ");
}

function GetScreenAuth($pgnm,$utype)
{
    $rs = GetRecordSet("select description from t_page_permission where page = '$pgnm' and assigntype like '%$utype%'");
    if(mysqli_num_rows($rs)>0)
        return true;
    else
        return false;
}


function AddDays($dt,$days)
{
    $dt = date_add($dt,  date_interval_create_from_date_string("$days days"));
    return date_format($dt, "d-M-y");
}

function SendAssConfirmMail($SNDR,$ASCD,$USR)
{
    $to      = $SNDR . ", nie@outlook.in";
    $subject = 'Confirmation from NIE India for Assessment Code : ' . $ASCD;
    $message = "Dear $USR \nWe are pleased to inform you that your details for examination is successfully registered in our website \nYour Assessment Code : $ASCD. \nAfter finalizing dates we will contact you As Soon As Possible.\nThanks for your choosing us.";
    $headers = 'From: info@nie.org.in';
    
    mail($to, $subject, $message, $headers);
}

function SendAssConfirmFran($SNDR,$ASCD,$USR)
{
    $to      = $SNDR . ", nie@outlook.in";
    $subject = 'Confirmation from NIE India for Franchise Code : ' . $ASCD;
    $message = "Dear $USR \nWe are pleased to inform you that your details for Franchise is successfully registered in our website \nYour Franchise Code : $ASCD. \n We will contact you As Soon As Possible.\nThanks for your choosing us.";
    $headers = 'From: info@nie.org.in';
    
    mail($to, $subject, $message, $headers);
}

function SendAssConfirmStu($SNDR,$ASCD,$USR)
{
    $to      = $SNDR . ", nie@outlook.in";
    $subject = 'Confirmation from NIE India for Student Registration Code : ' . $ASCD;
    $message = "Dear $USR \nWe are pleased to inform you that your details for courses is successfully registered in our website \nYour Student Registration Code : $ASCD. \n We will contact you As Soon As Possible.\nThanks for your choosing us.";
    $headers = 'From: info@nie.org.in';
    
    mail($to, $subject, $message, $headers);
}

function PrintHeader($HDING)
{
    $STR = "<hr/>";
    $STR = $STR . "<table style='width: 100%;'>";
    $STR = $STR . "<tr>";    
    $STR = $STR . "<td style='width: 20%;text-align:left'><b>Customer :</b> " . $_SESSION["u"] . "</td>";
    $STR = $STR . "<th style='width: 60%;text-align:center'>" . $HDING .  "</th>";
    $STR = $STR . "<td style='width: 20%;text-align:right'><b>Phone :</b> " . $_SESSION["ph"] . "</td>";
    $STR = $STR . "</tr>";                
    $STR = $STR . "</table>";                
    $STR = $STR . "<hr/>";                
    echo $STR;
}

function getOrderStaus($STS)
{
    if($STS=="N")
    {
        return "New Order";
    }
    else
    if($STS=="C")
    {
        return "Order Has Been Confirmed";
    }
    else
    if($STS=="L")
    {
        return "Order Has Been Cancelled";
    }
    else
    if($STS=="D")
    {
        return "Order Has Been Deleted";
    }
}

function getCustomerAddress($PHNO)
{
    $RS = "";
    $rs = GetRecordSet("select * from t_customer where cst_phone = '$PHNO'");
    if(mysqli_num_rows($rs)>0)
    {
        $ar = mysqli_fetch_array($rs);
        $RS = $RS . $ar['cst_address'] . ", " . $ar['cst_street'] . "<br/>";
        $RS = $RS . $ar['cst_location'] . ", " . $ar['cst_city'] . "<br/>";
        $RS = $RS . "Dist : " .  $ar['cst_district'] . ", " . $ar['cst_state'] . "<br/>";
        $RS = $RS . "PinCode : " .  $ar['cst_pincode'] . ".";
    }
    
    return $RS;
}

function GetAssementCode()
{
    $rs = GetRecordSet("select max(ucode)+1 from t_user");
    $a = mysqli_fetch_array($rs);
    return $a[0];
}

function GetNewSerialNo($TBL,$COL)
{
    $rs = GetRecordSet("select max($COL)+1 from $TBL");
    $a = mysqli_fetch_array($rs);
    if($a[0]!="")
        return $a[0];
    else
        return 1;
}


function DMLExecute($SQL)
{
    $con = GetConnection();
    mysqli_query($con, $SQL);
}

function DMLExecuteCommit($SQL)
{
    $con = GetConnection();
    mysqli_query($con, $SQL);
    $con->commit;
}

function PrintMessage($msg)
{
    if($msg!="")
    echo "<script type='text/javascript'>alert('$msg');</script>"; 
}

function GetRecordSet($SQL)
{
    $con = GetConnection();
    $res = mysqli_query($con, $SQL);
    return $res;
}


function GetArrayData($ar)
{
    $ret = "";
    foreach ($ar as $v)
        $ret .= $v . " ";
    
    return $ret;
}

function GOC($ODATA,$CDATA)
{
    if($ODATA==$CDATA)
        echo "selected";
}

function GOR($ODATA,$CDATA)
{
    if($ODATA==$CDATA)
        echo "checked";
}

function MVC($CDATA)
{
    $DTR = "";
    foreach ($CDATA as $dt)
    {
        $DTR .= $dt . ",";
    }
    return $DTR;
}

function GOCH($ODATA,$CDATA)
{
    foreach ($CDATA as $dt)
    {
    if($ODATA==$dt)
        echo "checked"; 
    }
}

function GOL($ODATA,$CDATA)
{
    foreach ($CDATA as $dt)
    {
    if($ODATA==$dt)
        echo "selected"; 
    }
}

function SetComboToTextBoxS($CTL,$SQL)
{
    $RETS = "<script type='text/javascript'>";
    $RETS .= "$(function() {";
    $RETS .= "var presidents = [";
    
    $rs = GetRecordSet($SQL);
    
    for($i=0;$i<mysqli_num_rows($rs)-1;$i++)
    {
        $ar =  mysqli_fetch_array($rs);
        $RETS .= "\"" . $ar[0] . "\",";
    }
    $ar1 =  mysqli_fetch_array($rs);
    $RETS .= "\"" . $ar1[0] . "\"];";            
    
    $RETS .= "$(\"#" . $CTL . "\").autocomplete({source: presidents});";            
    $RETS .= "});</script>";            
    return $RETS;
}

function GenGRIDPaging($GridName,$SQL,$NOP,$CLSNAME,$HIDX,$PGNM,$WIDTH,$COLWIDTH,$LNKIDX,$LINK)
{
    $RETS = "";
    $res = GetRecordSet($SQL);
    $LIDX = ceil((mysqli_num_rows($res)/$NOP));
    if($HIDX!="")
        $idx = $HIDX;
    else
        $idx = 1;

    if($idx>$LIDX)
    { 
        $idx = $LIDX;
    }
    else
    if($idx<=0)
    { 
        $idx = 1;
    }
    
    $RETS .= "<table $CLSNAME style='width:$WIDTH'>";
    
    if (count($COLWIDTH)>0)
    {
        $RETS .= GetColumnWidths($COLWIDTH);
    }
    
    $RETS .= "<tdata>";
    $RETS .= "<tr $CLSNAME>";
    $fls = mysqli_fetch_fields($res);
    foreach ($fls as $vl)
    {
        $RETS .= "<th $CLSNAME>" . $vl->name . "</th>";
    }
    $RETS .= "</tr>";
    mysqli_data_seek($res, ($idx-1)*$NOP);
    for($j=1;$j<=$NOP;$j++)
    {
           if(($arr = mysqli_fetch_array($res)))
           {
            $RETS .= "<tr $CLSNAME>";
            for($i=0;$i<$res->field_count;$i++)
            {
                if(($LNKIDX-1)==$i && $LNKIDX>0)
                $RETS .= "<td $CLSNAME><a href='$LINK$arr[$i]'>" . $arr[$i] . "</a></td>";
                else
                $RETS .= "<td $CLSNAME>" . $arr[$i] . "</td>";
            }
            $RETS .= "</tr>";
           }
    }
    $RETS .= "</tdata>";
    $RETS .= "<tfoot>";
    
    $RETS .= "<tr $CLSNAME><td style='border: none;text-align:left; background-color: #e9e9d3;' colspan='$res->field_count'>";

    if($idx>1)
        $RETS .= "<a href='$PGNM' onclick=\"return GPrev('" . $GridName . "');\">Prev</a> ";
    if($idx<$LIDX)
        $RETS .= "<a href='$PGNM' onclick=\"return GNext('" . $GridName . "');\">Next</a> ";
    
    $RETS .= "<input type='text' id='" . $GridName . "txt_idx' value='$idx' style='width:30px;border:solid;border-width:1px;text-align:center' /> ";
    $RETS .= "<a href='$PGNM' onclick=\"return GGoto('" . $GridName . "');\">Go</a>";
    
    $RETS .= "</td></tr>";
    
    $RETS .= "</tfoot>";
    $RETS .= "</table>";

    $RETS .= "<input type='hidden' id='" . $GridName . "hid_idx' name='" . $GridName . "hid_idx' value='" . $idx . "' />";
    $RETS .= "<input type='hidden' id='hid_grd_idx' name='hid_grd_idx' />";

    return $RETS;
}



function GenGRIDPagingCHK($GridName,$SQL,$NOP,$CLSNAME,$HIDX,$PGNM,$WIDTH,$COLWIDTH,$LNKIDX,$LINK,$CHKNM)
{
    $RETS = "";
    $res = GetRecordSet($SQL);
    $LIDX = ceil((mysqli_num_rows($res)/$NOP));
    if($HIDX!="")
        $idx = $HIDX;
    else
        $idx = 1;

    if($idx>$LIDX)
    { 
        $idx = $LIDX;
    }
    else
    if($idx<=0)
    { 
        $idx = 1;
    }
    
    $RETS .= "<table $CLSNAME style='width:$WIDTH'>";
    
    if (count($COLWIDTH)>0)
    {
        $RETS .= GetColumnWidths($COLWIDTH);
    }
    
    $RETS .= "<tdata>";
    $RETS .= "<tr $CLSNAME>";
    $fls = mysqli_fetch_fields($res);
    $RETS .= "<th $CLSNAME>&nbsp;</th>";
    foreach ($fls as $vl)
    {
        $RETS .= "<th $CLSNAME>" . $vl->name . "</th>";
    }
    $RETS .= "</tr>";
    mysqli_data_seek($res, ($idx-1)*$NOP);
    for($j=1;$j<=$NOP;$j++)
    {
           if(($arr = mysqli_fetch_array($res)))
           {
            $RETS .= "<tr $CLSNAME>";
            $RETS .= "<td $CLSNAME><input type='checkbox' id='$CHKNM' name='$CHKNM' value='$arr[0]'/></td>";
            for($i=0;$i<$res->field_count;$i++)
            {
                if(($LNKIDX-1)==$i && $LNKIDX>0)
                $RETS .= "<td $CLSNAME><a href='$LINK$arr[$i]'>" . $arr[$i] . "</a></td>";
                else
                $RETS .= "<td $CLSNAME>" . $arr[$i] . "</td>";
            }
            $RETS .= "</tr>";
           }
    }
    $RETS .= "</tdata>";
    $RETS .= "<tfoot>";
    
    $RETS .= "<tr $CLSNAME><td style='border: none;text-align:left; background-color: #e9e9d3;' colspan='$res->field_count'>";

    if($idx>1)
        $RETS .= "<a href='$PGNM' onclick=\"return GPrev('" . $GridName . "');\">Prev</a> ";
    if($idx<$LIDX)
        $RETS .= "<a href='$PGNM' onclick=\"return GNext('" . $GridName . "');\">Next</a> ";
    
    $RETS .= "<input type='text' id='" . $GridName . "txt_idx' value='$idx' style='width:30px;border:solid;border-width:1px;text-align:center' /> ";
    $RETS .= "<a href='$PGNM' onclick=\"return GGoto('" . $GridName . "');\">Go</a>";
    
    $RETS .= "</td></tr>";
    
    $RETS .= "</tfoot>";
    $RETS .= "</table>";

    $RETS .= "<input type='hidden' id='" . $GridName . "hid_idx' name='" . $GridName . "hid_idx' value='" . $idx . "' />";
    $RETS .= "<input type='hidden' id='hid_grd_idx' name='hid_grd_idx' />";

    return $RETS;
}


function GetColumnWidths($ARRWIDTH)
{
    $RETS = "<colgroup>";
    foreach ($ARRWIDTH as $vl)
    {
        $RETS .= "<col width=\"$vl px\" />";
    }
    $RETS .= "</colgroup>";
    return $RETS;
}    
    

function GenGRID($SQL,$CLSNAME,$WIDTH,$COLWIDTH)
{
    $res = GetRecordSet($SQL);
    $RETS .= "<table $CLSNAME style='width:$WIDTH'>";
    $RETS .= "<tr>";
    $fls = mysqli_fetch_fields($res);
    foreach ($fls as $vl)
    {
        $RETS .= "<th>" . $vl->name . "</th>";
    }
    $RETS .= "</tr>";
    
    if(count($COLWIDTH)>0)
    {
        $RETS .= GetColumnWidths($COLWIDTH);
    }
    
    $RETS .= "<tdata>";
    while($arr = mysqli_fetch_array($res))
    {
        $RETS .= "<tr>";
        for($i=0;$i<$res->field_count;$i++)
        {
            $RETS .= "<td>" . $arr[$i] . "</td>";
        }
        $RETS .= "</tr>";
    }
    $RETS .= "</tdata>";
    $RETS .= "</table>";

    return $RETS;
}


function GenGRIDSCROLL($SQL,$CLSNAME,$WIDTH,$COLWIDTH)
{
    $res = GetRecordSet($SQL);
    
    if(mysqli_num_rows($res)<=5)
    {
        return GenGRID($SQL, $CLSNAME, $WIDTH, $COLWIDTH);
    }
    
    $SWIDTH = $WIDTH + 17;
    $RETS .= "<div class='gridH' style='width:$SWIDTH'>";
    $RETS .= "<table $CLSNAME style='width:$WIDTH'>";
    if(count($COLWIDTH)>0)
    {
        $RETS .= GetColumnWidths($COLWIDTH);
    }
    $RETS .= "<tdata>";
    $RETS .= "<tr $CLSNAME>";
    $fls = mysqli_fetch_fields($res);
    foreach ($fls as $vl)
    {
        $RETS .= "<th $CLSNAME>" . $vl->name . "</th>";
    }
    $RETS .= "</tr>";
    $RETS .= "</tdata>";
    $RETS .= "</table $CLSNAME style='width:$WIDTH'>";
    
    $RETS .= "<div class='gridB' style='width:$SWIDTH'>";
    $RETS .= "<table>";
    if(count($COLWIDTH)>0)
    {
        $RETS .= GetColumnWidths($COLWIDTH);
    }
    
    $RETS .= "<tdata>";
    while($arr = mysqli_fetch_array($res))
    {
        $RETS .= "<tr $CLSNAME>";
        for($i=0;$i<$res->field_count;$i++)
        {
            $RETS .= "<td $CLSNAME>" . $arr[$i] . "</td>";
        }
        $RETS .= "</tr>";
    }
    $RETS .= "</tdata>";
    $RETS .= "</table>";
    $RETS .= "</div>";
    $RETS .= "</div>";
    
    return $RETS;
}


function GenGRIDSCROLLCHK($SQL,$CLSNAME,$WIDTH,$COLWIDTH,$CHKNM,$LNKIDX,$LINK)
{
    $res = GetRecordSet($SQL);
    
    $SWIDTH = $WIDTH + 15;
    $RETS .= "<div class='gridH' style='width:$SWIDTH'>";
    $RETS .= "<table $CLSNAME style='width:$WIDTH'>";
    if(count($COLWIDTH)>0)
    {
        $RETS .= GetColumnWidths($COLWIDTH);
    }
    $RETS .= "<tdata>";
    $RETS .= "<tr $CLSNAME>";
    $RETS .= "<th $CLSNAME>Check</th>";
    $fls = mysqli_fetch_fields($res);
    foreach ($fls as $vl)
    {
        $RETS .= "<th $CLSNAME>" . $vl->name . "</th>";
    }
    $RETS .= "</tr>";
    $RETS .= "</tdata>";
    $RETS .= "</table $CLSNAME style='width:$WIDTH'>";
    
    $RETS .= "<div class='gridB' style='width:$SWIDTH'>";
    $RETS .= "<table>";
    if(count($COLWIDTH)>0)
    {
        $RETS .= GetColumnWidths($COLWIDTH);
    }
    
    $RETS .= "<tdata>";
    while($arr = mysqli_fetch_array($res))
    {
        $RETS .= "<tr $CLSNAME>";
        $RETS .= "<td $CLSNAME><input type='checkbox' id='$CHKNM' name='$CHKNM' value='$arr[0]'/></td>";
        for($i=0;$i<$res->field_count;$i++)
        {
            if(($LNKIDX-1)==$i && $LNKIDX>0)
            $RETS .= "<td $CLSNAME><a href='$LINK$arr[$i]'>" . $arr[$i] . "</a></td>";
            else
            $RETS .= "<td $CLSNAME>" . $arr[$i] . "</td>";
        }
        $RETS .= "</tr>";
    }
    $RETS .= "</tdata>";
    $RETS .= "</table>";
    $RETS .= "</div>";
    $RETS .= "</div>";
    
    return $RETS;
}


function GenDropDownSQL($CID,$SQL,$VALS,$CLASS)
{
    $rs = GetRecordSet($SQL);
    $RETS = "<select name=$CID id=$CID class='$CLASS'>";
    $RETS .= "<option value=''><#===SELECT===#></option>";
    while($ar = mysqli_fetch_array($rs))
    {
        if($VALS==$ar[0])
            $RETS .= "<option value='$ar[0]' checked='true'>" . $ar[1] . "</option>";
        else
            $RETS .= "<option value='$ar[0]'>" . $ar[1] . "</option>";
    }
    $RETS .= "<select>";
    return $RETS;
}

function GenListBoxSQL($CID,$SQL,$VALS,$CLASS)
{
    $rs = GetRecordSet($SQL);
    $RETS = "<select name=$CID id=$CID class='$CLASS' multiple='multiple'>";
    while($ar = mysqli_fetch_array($rs))
    {
            $RETS .= "<option value='$ar[0]' GOL('$ar[0]',$VALS)>" . $ar[1] . "</option>";
    }
    $RETS .= "<select>";
    return $RETS;
}




function GenerateTreeView($File)
{
$doc = new DomDocument("1.0");
$doc->loadXML( file_get_contents($File) );
$root = $doc->firstChild;
print "<div class='wfm'>";
print "<ul>";
traverse( $root );
print "</ul>";    
print "</div>";    
}

function traverse( DomNode $node, $level=0 ){
  handle_node( $node);
 if ( $node->childNodes->length>1 ) {
   print "\n<ul>";  
   $children = $node->childNodes;
   foreach( $children as $kid ) {
     if ( $kid->nodeType == XML_ELEMENT_NODE ) {
       traverse( $kid, $level+1 );
     }
   }
   print "\n</ul></li>";
 }
}

function handle_node( DomNode $node) {
    
  if ( $node->nodeType == XML_ELEMENT_NODE ) {
    print "\n<li>";
    print "<div>";
        print "<img alt='' class='expand' src='tree/Images/Minus.png' /> ";
        print "<img alt='' class='collapse' src='tree/Images/Plus.png' /> ";
    print "</div>"; 
    //print "<div>";
    //    print "<input id='Checkbox1' type='checkbox' />";
    //print "</div>"; 
    print "<div>&nbsp;&nbsp;&nbsp;";
        if($node->getAttribute("page")=="")
            print $node->getAttribute("name");
        else
            print "<a href='" . $node->getAttribute("page") . "' onclick=\"return OpenPage('" . $node->getAttribute("page") . "');\">" . $node->getAttribute("name") . "</a>";
    print "</div>";             
                
    
    if($node->childNodes->length==1)
    {
        print "</li>";
    }
  }
}
?>