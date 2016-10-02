<?php
session_start();
if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
{
echo "Correct Code Entered";
//Do you stuff
}
else
{
die("Wrong Code Entered");
}
?>

<html>
<head>
<title>Test Form</title>
</head>
<body>
<form action="validate.php" method="post">
Enter Image Text
<input type="text" name="captcha">
<img src="captcha.php" /><br>
<input name="submit" type="submit" value="Submit">
</form>
</body>
</html>