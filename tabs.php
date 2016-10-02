<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <script type="text/javascript" src="jquery-1.10.2.js">
        </script>    
        
        <script type="text/javascript">
        function validate()
        {
            $('#apply-form input[type="text"]').each(function() {
                if(this.required)
                {
                    if(this.value=="")
                        $(this).addClass("inpterr");
                    else
                        $(this).addClass("inpterrc");
                }
                //alert($(this).attr("VT"));    
                //$(this).attr("VT").
                if($(this).attr("VT")=="NM")
                {
                    if((!isAlpha(this.value)) && this.value!="")
                    {
                       alert("Only Aplhabets Are Allowed . . .");
                       $(this).focus();
                    }
                }
				
				if($(this).attr("VT")=="PH")
				{
					if((!isPhone(this.value)) && this.value!="")
					{
						alert("Check the format . . .");
						$(this).focus();
					}
        		}
				
				if($(this).attr("VT")=="EML")
				{
					if(!IsEmail($("#txteml").val()) && this.value!="")
		 		 	{
				  		alert("Invalid Email . . . .");
						$(this).focus();
				  	}
				}	
				
				if($(this).attr("VT")=="WEB")
				{
					if((!IsWeb(this.value)) && this.value!="")
					{
						alert("Invalid Website . . . .");
						$(this).focus();
					}
				}
				
				if($(this).attr("VT")=="PIN")
				{
					if((!IsPin(this.value)) && this.value!="")
					{
						alert("Invalid Pin Code . . . .");
						$(this).focus();
					}
				}
			
            });
        }
        
        function isAlpha(x)
        {
            var re = new RegExp(/^[a-zA-Z\s]+$/);
            return re.test(x);
        }
        
		function isPhone(x)
		{
			
			var ph = new RegExp (/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/);  
			//if(!ph.length<10)
			return ph.test(x);
		}
		
		function IsEmail(x) 
		{
  			var em = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
  			return em.test(x);
		}
		
		function IsWeb(x) 
		{
  			var we = new RegExp (/(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/);
			var ww = new RegExp ();
  			return ww.test(x);
  			return we.test(x);
		}		
		
		
		function IsPin(x) 
		{
  			var pin = new RegExp (/^\d{6}$/);
			
  			return pin.test(x);
		}		
        </script>
        
        <style type="text/css">
            .inpterr
            {
                border: 1px solid red;
                background: #FFCECE;

            }
            
            .inpterrc
            {
                border: 1px solid black;
                background: white;
            }
        </style>
        
    </head>
    <body>
        
        <form id="apply-form" action="tabs.php" method="post">
        
            Name : <input type="text" id="txtnm" required="true" VT="NM" />
		<br/>
		<br/>
		<br/>        
            Phone No. : <input type="text" id="txtph" maxlength="10" required="true" VT="PH" />
		<br/>
		<br/>
		<br/>			
			Email : <input type="text" id="txteml" VT="EML" required="true"/>
		<br/>
		<br/>
		<br/>     
		
			Website : <input type="text" id="txtweb" VT="WEB" required="true"/>
		<br/>
		<br/>
		<br/>     
		
		Pincode : <input type="text" id="txtpin" VT="PIN" required="true"/>
		<br/>
		<br/>
		<br/> 
		
		<fieldset>
			<input type="radio" id="r1" name="rr"> Male </input><br/><br/>
			<input type="radio" id="r1" name="rr"> Female </input>			
        </fieldset> 
		
		<br/>
		<br/>
		<br/>   
	
	<fieldset>	
		
		       Good<input type="checkbox" id="c1" name="cc1" /><br/><br/>
				Better<input type="checkbox" id="c1" name="cc2" /><br/><br/>
				Best<input type="checkbox" id="c1" name="cc3" />

	 </fieldset> 
		
		<br/>
		<br/>
		<br/> 
        <input type="button" onClick="validate();" value="test" />
		</form>
        
    </body>
</html>
