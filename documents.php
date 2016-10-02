<?php


error_reporting(0);
session_start();

include 'fileupload.php';   
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
        
        <script type="text/javascript">
            
            function send()
            {
                if(document.getElementById('dec').checked)
                    {
                        window.location='admsnreport.php';
                        return false;
                    }
                    return true;
            }
        </script>
    </head>
    <body style="background-image:url('./images/inbg.jpg');">
        <form id="docup" enctype="multipart/form-data" name="docup" action="documents.php" method="post">
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img>
                  </div>
                 </div>    
             </div>
            <div class="container" style="margin-left:100px;">
            <table class="table table-striped">
                            <thead>
                                       <tr>
                                           <th >
                                       <font style=" font-family: Verdana;  font-size:19px;"> Upload Your Documents</font>
                                           </th>
                                        </tr>           
                            </thead>
                            <tbody>
                            <tr>
                                 <td>Passport Size Image :</td>
                                 <td><input type="file" id="fpic" name="fpic" ><br>
                                     </td>
                            </tr> 
                           
                             <tr>
                                <td>10th Mark Sheet :</td>
                                <td>
                                     <input type="file" id="ftndoc" name="ftndoc"><br>
                                     
                                 </td>
                             </tr>
                             
                             <tr>
                                 <td>
                                     10th Certificate :
                                 </td>
                                 <td>
                                     <input type="file" id="ftcdoc" name="ftcdoc"><br>
                                     
                                 </td>
                             </tr>
                              
                             <tr>
                                 <td>
                                     12th/Diploma Mark Sheet :
                                 </td>
                             
                            
                                 <td>
                                     <input type="file" id="fdmdoc" name="fdmdoc"><br>
                                     
                                 </td>
                             </tr>
                             <tr>
                                <td>
                                    12th/Diploma Certificate :
                                </td>
                             
                                <td><input type="file" id="fdcdoc" name="fdcdoc"><br>
                                 </td>
                             </tr>
                             
                            <tr>
                                <td>
                                    Identity Proof
                                </td>
                            
                                 <td>
                                    <input type="file" id="fide" name="fide"><br>
                                 
                                </td>
                            </tr> 
                            
                            <tr>
                                <td>
                                    Signature
                                </td>
                            
                                 <td>
                                    <input type="file" id="fsig" name="fsig"><br>
                                 
                                </td>
                            </tr>
                            
                            <tr>
                                
                                <td colspan="2"><input type="submit" id="fpicup" name="fpicup" class="toggle btn btn-primary"></td>
                            </tr>
                           
                           </tbody>
                       </table>
        </div>
            <div class="container">
              <center> <div class="jumbotron" style="width:100%; box-shadow: -3px 3px 10px #999999;   margin-top:10px;">
                      <h3>
                          <b> <font style=" font-family: Verdana;  font-size:19px;"> Declaration By The Applicant</font></b>
                      </h3>
                           <p><font style=" font-family: Verdana;font-size:medium">
                                    I hereby solemnly declare that all the particulars given in this form are true to the best of my knowledge
                                    and belief. I shall abide by the rules and regulations laid down by the College from time to time.
                                    In case the particulars furnished by me are found false, my admission stands canceled.
                          
                                </font></p>
                           
                           <input type="checkbox" id="dec" name="dec" value="I accept" onclick="send()"><font style=" font-family: Verdana;font-size:medium">
                           I accept</font>
                               
                           
                         
                  </div>
            </div>
        </form>
    </body>
</html>
