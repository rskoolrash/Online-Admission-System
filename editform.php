<?php
    session_start();
    error_reporting(0);

    $unam = $_REQUEST["unam"];
    $uphn1 =$_REQUEST["uphn1"];
    $uphn2 =$_REQUEST["uphn2"];
    
    $ufname =$_REQUEST["ufname"];
    $ufocc=$_REQUEST["ufocc"];
    $ufphn=$_REQUEST["ufphn"];
    
    $umname=$_REQUEST["umname"];
    $umocc=$_REQUEST["umocc"];
    $umphn=$_REQUEST["umphn"];
    
    $inc=$_REQUEST["inc"];
    $gen=$_REQUEST["gen"];
    
    $cadr=$_REQUEST["cadr"];
    $cast=$_REQUEST["cast"];
    $capin=$_REQUEST["capin"];
    $camob=$_REQUEST["camob"];
    
    $padr=$_REQUEST["padr"];
    $past=$_REQUEST["past"];
    $papin=$_REQUEST["papin"];
    $pamob=$_REQUEST["pamob"];
    
    $rur=$_REQUEST["rur"];
    $natn=$_REQUEST["natn"];
    $relg=$_REQUEST["relg"];
    $cat=$_REQUEST["cat"];
    $oaco=$_REQUEST["oaco"];
    $oarank=$_REQUEST["oarank"];
    $oaroll=$_REQUEST["oaroll"];
    $oabrn=$_REQUEST["oabrn"];
    $brnc=$_REQUEST["brnc"];
    $col=$_REQUEST["col"];
    $cen=$_REQUEST["cen"];
    $crsty=$_REQUEST["crsty"];
    $pcm=$_REQUEST["pcm"];
    
    $nob1=$_REQUEST["nob1"];
    $yop1=$_REQUEST["yop1"];
    $tm1=$_REQUEST["tm1"];
    $mo1 =$_REQUEST["mo1"];
    $divs1=$_REQUEST["divs1"];
    $pom1  =$_REQUEST["pom1"];
    
    $nob2  =$_REQUEST["nob2"];
    $yop2=$_REQUEST["yop2"];
    $tm2=$_REQUEST["tm2"];
    $mo2  =$_REQUEST["mo2"];
    $divs2  =$_REQUEST["divs2"];
    $pom2  =$_REQUEST["pom2"];
       
    $moi  = $_REQUEST["moi"];
    $pay= $_REQUEST["pay"];
    
    $con=mysqli_connect("localhost","root","","oas");
    
    
    if(!isset($con))
    {
        die("Database Not Found");
    }
    
    
    if(isset($_REQUEST["frmupdate"]))
    {
        $sql="update t_user set

s_phn1='$uphn1', s_phn2='$uphn2', f_name='$ufname', f_occ='$ufocc', f_phn='$ufphn', m_name='$umname',
m_occ='$umocc', m_phn='$umphn', s_iop='$inc', s_sex='$gen', s_cadr='$cadr', s_cst='$cast', s_cpin='$capin', s_cmob='$camob',
 s_padr='$padr', s_pst='$past', s_ppin='$papin', s_pmob='$pamob', s_ruc='$rur', s_natn='$natn',
s_relg='$relg', s_catg='$cat', s_mainsxam='$oaco', s_mainsrank='$oarank', s_mainsroll='$oaroll',
s_mainsbrnch='$oabrn', s_branch='$brnc',s_college='$col', s_center='$cen', s_crtype='$crsty', 
s_pcm='$pcm', s_tenbrd='$nob1', s_tenyop='$yop1', s_tentotmark='$tm1', s_tenmarkob='$mo1',
s_tendiv='$divs1', s_tenprcmark='$pom1', s_twlbrd=' $nob2 ', s_twlyop='$yop2', 
s_twltotmark='$tm2', s_twlmarkob='$mo2', s_twldiv='$divs2', s_twlprcmark='$pom2', s_moi='$moi', s_pay='$pay'
where s_id='".$_SESSION['user']."'";

$sql1="update t_user_data set s_name='$unam' where s_id='".$_SESSION['user']."'";
mysqli_query($con, $sql);
mysqli_query($con, $sql1);

        
        header('location:homepageuser.php');
        echo "<script type='text/javascript'>alert('Details Uploaded !!');</script>";
        
        
    }
    
    
$q=mysqli_query($con,"select s_name from t_user_data where s_id='".$_SESSION['user']."'");
$n=  mysqli_fetch_assoc($q);
$stname= $n['s_name'];


?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link type="text/css" rel="stylesheet" href="css/admform.css"></link>
        
        
        
    </head>
     <body style="background-image:url('./images/inbg.jpg');">
        <form id="edform" action="editform.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img>
                  </div>
                 </div>    
             </div>
            <div id="dmid" class="container-fluid">  
                
                 <div class="row">
                    <div class="col-sm-12">
                        <font style="color:white; margin-left:520px; font-family: Verdana; width:100%; font-size:30px;">
                        <b>ADMISSION FORM</b> </font>
                      </div>
                 </div>
                
             </div>
                       
                       
            <table class="frmtbl">
                <?php
            
                    $result = mysqli_query($con,"SELECT * FROM t_user WHERE s_id='".$_SESSION['user']."'");

                            while($row = mysqli_fetch_array($result))
                              {
                        
                ?>
                <tr border="1" class="hdrow">
                    
                 </tr>       
                 
                  <tr>
                      <td> <font style="font-family: Verdana;">Name </font> </td>
                    <td colspan="2"> <input type="text" id="unam" name="unam" value="<?php echo $stname;?>">
                  </tr>
                  
                  <tr>
                    <td> <font style="font-family: Verdana;">Student's Mobile No.</font>  </td>
                    <td colspan="3"> <input type="text" id="uphn1" name="uphn1" value="<?php echo $row[2]  ?>">
                    <input type="text" id="uphn2" name="uphn2" value="<?php echo $row[3]  ?>"></td>
                  </tr>
                
                  <tr>
                    <td><font style="font-family: Verdana;"> Father's Name</font></td>
                    <td  colspan="3"> <input type="text" id="ufname" name="ufname" value="<?php echo $row[4]  ?>" > </td>
                   </tr>
                 
                  <tr>
                    <td> <font style="font-family: Verdana;">Father's Occupation</font></td>
                    <td> <input type="text" id="ufocc" name="ufocc" value="<?php echo $row[5] ?>"> </td>
                    <td><font style="font-family: Verdana;"> Mobile No.</font></td>
                    <td> <input type="text" id="ufphn" name="ufphn" value="<?php echo $row[6] ?>"> </td>
                  </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Name</font> </td>
                    <td colspan="3"> <input type="text" id="umname" name="umname" value="<?php echo $row[7] ?>"></td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Mother's Occupation</font></td>
                    <td> <input type="text" id="umocc" name="umocc" value="<?php echo $row[8] ?>"> </td>
                     <td> <font style="font-family: Verdana;">Mobile No.</font></td>
                    <td> <input type="text" id="umphn" name="umphn" value="<?php echo $row[9] ?>"></td>
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Income of Parents </font>
                     <td  colspan="3"><input type="text" id="inc" name="inc" value="<?php echo $row[10] ?>"></td>
                </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Sex </font>
                    <td><input type="radio" id="gen" name="gen" value="Male"><font style="font-family: Verdana;">Male</font>
                     <input type="radio" id="gen" name="gen" value="Female"><font style="font-family: Verdana;">Female </font></td>       
                    
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Correspondent Address</font>
                    <td colspan="3"><input type="text" id="cadr" name="cadr" value="<?php echo $row[12] ?>" ><br>
                          <input type="text" id="cast" name="cast" value="<?php echo $row[13] ?>" style="margin-top: 4px;"><br>
                          <input type="text" id="capin" name="capin" value="<?php echo $row[14] ?>" style="margin-top: 4px;"><br>
                          <input type="text" id="camob" name="camob" value="<?php echo $row[15] ?>" style="margin-top: 4px;"><br>
                </td>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Permanent Address</font>
                    <td colspan="3"><input type="text" id="padr" name="padr" value="<?php echo $row[16] ?>" ><br>
                          <input type="text" id="past" name="past" value="<?php echo $row[17] ?>" style="margin-top: 4px;"><br>
                          <input type="text" id="papin" name="papin" value="<?php echo $row[18] ?>" style="margin-top: 4px;"><br>
                          <input type="text" id="pamob" name="pamob" value="<?php echo $row[19] ?>" style="margin-top: 4px;"><br>
                    </td>
                </tr>   
               
                <tr>
                    <td colspan="4"><input type="radio" id="rur" name="rur" value="Rural"><font style="font-family: Verdana;">
                        Rural
                        <input type="radio" id="rur" name="rur" value="Urban"><font style="font-family: Verdana;">Urban</font>
                        <input type="radio" id="rur" name="rur" value="City"><font style="font-family: Verdana;">City</font></td>
                 </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Nationality</font>
                    <td><input type="text" id="natn" name="natn" value="<?php echo $row[21] ?>"></td>
                    <td><font style="font-family: Verdana;"> Religion</font>
                    <td><input type="text" id="relg" name="relg" value="<?php echo $row[22] ?>"></td>
                </tr>    
               
                <tr>
                    <td colspan="4"><input type="radio" id="cat" name="cat" value="SC"><font style="font-family: Verdana;">
                        SC
                        <input type="radio" id="cat" name="cat" value="ST"><font style="font-family: Verdana;">ST</font>
                        <input type="radio" id="cat" name="cat" value="OBC"><font style="font-family: Verdana;">OBC</font>
                        <input type="radio" id="cat" name="cat" value="GEN"><font style="font-family: Verdana;">GEN</font></td>
                 </tr>
                  
                 
                 <tr>
                    <td><font style="font-family: Verdana;">Exam</font></td>
                    <td><select id="oaco" name="oaco" >
                            <option><?php echo $row[24] ?></option>
                            <option>JEE MAIN</option>
                            <option>OJEE</option>
                            <option>CUEE</option>
                        </select>
                            
                    </td>
                    <td><font style="font-family: Verdana;">Rank</font></td>
                    <td><input type="text" id="oarank" name="oarank" value="<?php echo $row[25] ?>"></td>
               </tr>  
               
               <tr>
                    <td><font style="font-family: Verdana;">Roll No.</font></td>
                    <td><input type="text" id="oaroll" name="oaroll" value="<?php echo $row[26] ?>"></td>
                    <td><font style="font-family: Verdana;">Alloted Branch</font></td>
                    <td><input type="text" id="oabrn" name="oabrn" value="<?php echo $row[27] ?>"></td>
               </tr>  
               
               
               <tr>
                    <td><font style="font-family: Verdana;">Choice of Branch</font></td>
                    <td><select id="brnc" name="brnc">
                         <option><?php echo $row[28] ?></option>
                         <option>COMPUTER SCIENCE AND ENG</option>
                         <option>ELECTRICAL AND ELECTRONICS ENG</option>
                         <option>ELECTRONICS AND COMM ENG</option>
                         <option>CIVIL ENG</option>
                         <option>MECHANICAL ENG</option>
                         <option>ELECTRONICS ENG</option>
                         </select>
                     </td>
               </tr>
               <tr>
                     <td><font style="font-family: Verdana;">College Name</font></td>
                     <td><select id="col" name="col">
                         <option><?php echo $row[29] ?></option>
                         <option>CIT</option>
                         <option>JITM</option>
                         </select>
                     </td>
                     
                </tr>
              
                <tr>
                     <td><font style="font-family: Verdana;">Center for exam</font></td>
                     <td><select id="cen" name="cen">
                         <option><?php echo $row[30] ?></option>
                         <option>Bhubaneshwar</option>
                         <option>Paralekhmundi</option>
                         </select>
                     </td>
                     
                </tr>
                
                <tr>
                     <td><font style="font-family: Verdana;">Course Type</font></td>
                     <td><select id="crsty" name="crsty">
                         <option><?php echo $row[31] ?></option>
                         <option>Regular</option>
                         <option>Lateral</option>
                         </select>
                     </td>
                     
                </tr>
                
                
                <tr>
                     <td><font style="font-family: Verdana;">% in PCM</font></td>
                     <td><input type="text" id="pcm" name="pcm" value="<?php echo $row[32] ?>"></td>
                     
                </tr>
                
                
               <tr>
                   <td><font style="font-family: Verdana;">Academic Qualification</font></td>
                   <td colspan="3">
                       <table class="table table-hover">
                           <thead>
                               <tr>
                                    <th><font style="font-family: Verdana;font-size: small">Exam</font> <br><font style="font-family: Verdana; font-size: small">passed</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Name of</font> <br><font style="font-family: Verdana;font-size: small">Board/University</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Year of</font> <br><font style="font-family: Verdana;font-size: small"> Passing</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Total</font><br><font style="font-family: Verdana;font-size: small"> Mark</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Mark</font> <br><font style="font-family: Verdana;font-size: small">Obtained</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Division</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">% of</font><br><font style="font-family: Verdana;font-size: small"> Marks</font></th>
                              </tr>   
                           </thead>
                            <tbody>
                           <tr>
                               <td><?php echo "10th"; ?></td>
                               <td><input type="text" id="nob1" name="nob1" value="<?php echo $row[33] ?>"></td>
                               <td><input type="text" id="yop1" name="yop1" class="actab" value="<?php echo $row[34] ?>"></td>
                               <td><input type="text" id="tm1" name="tm1" class="actab" value="<?php echo $row[35] ?>"></td>
                               <td><input type="text" id="mo1" name="mo1" class="actab" value="<?php echo $row[36] ?>"></td>
                               <td><input type="text" id="divs1" name="divs1" class="actab" value="<?php echo $row[37] ?>"></td>
                               <td><input type="text" id="pom1" name="pom1" class="actab" value="<?php echo $row[38] ?>"></td>
                           </tr>
                           <tr>
                               <td><?php echo "12th/Diploma"; ?> </td>
                               <td><input type="text" id="nob2" name="nob2" value="<?php echo $row[39] ?>"></td>
                               <td><input type="text" id="yop2" name="yop2" class="actab" value="<?php echo $row[40] ?>"></td>
                               <td><input type="text" id="tm2" name="tm2" class="actab" value="<?php echo $row[41] ?>"></td>
                               <td><input type="text" id="mo2" name="mo2" class="actab" value="<?php echo $row[42] ?>"></td>
                               <td><input type="text" id="divs2" name="divs2" class="actab" value="<?php echo $row[43] ?>"></td>
                               <td><input type="text" id="pom2" name="pom2" class="actab" value="<?php echo $row[44] ?>"></td>
                           </tr>
                           
                            </tbody>
                       </table>
                       
                           <tr>
                               <td><font style="font-family: Verdana;">Medium of Instruction till class 10th</font></td>
                               <td colspan="3">
                                    <input type="radio" id="moi" name="moi" value="Odia">Odia
                                    <input type="radio" id="moi" name="moi" value="Hindi"><font style="font-family: Verdana;">Hindi</font>
                                    <input type="radio" id="moi" name="moi" value="English"><font style="font-family: Verdana;">English</font>
                                    <input type="radio" id="moi" name="moi" value="Telugu"><font style="font-family: Verdana;">Telugu</font>
                                    <input type="radio" id="moi" name="moi" value="Bengali"><font style="font-family: Verdana;">Bengali</font>
                                    <input type="radio" id="moi" name="moi" value="Others"><font style="font-family: Verdana;">Others</font>
                               </td>
                           </tr>
                           
                           
                           <tr>
                               <td><font style="font-family: Verdana;">Mode of Payment</font></td>
                               <td colspan="3">
                                    <input type="radio" id="pay" name="pay" value="Loan"><font style="font-family: Verdana;">Loan</font>
                                    <input type="radio" id="pay" name="pay" value="Self"><font style="font-family: Verdana;">Self</font>
                               </td>
                           </tr>
                 
                 
                           
                           <tr>
                                <td colspan="4">
                                   <center> <input type="submit" id="frmupdate" name="frmupdate" value="Update" ></center>
                                </td>
                           </tr>
                           
                           <?php
                           
                              }
                           ?>
                       </table>
            <br>
                       
                            
            <br>
                       
                  </form>
            </body>
</html>
