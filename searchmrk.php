<?php

if($_POST)
{
$q=$_POST['search'];

$sql_res=mysql_query("select s_name from t_usermark where s_name like '%$q%' order by id LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$username=$row['s_name'];

$b_username='<strong>'.$q.'</strong>';

$final_username = str_ireplace($q, $b_username, $username);

?>
<div class="show" align="left">
<span class="name"><?php echo $final_username; ?></span>&nbsp;<br/>
</div>
<?php
}
}
?>
