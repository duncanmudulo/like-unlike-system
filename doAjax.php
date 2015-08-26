<?php
include "db.php";
$ip = $_SERVER['REMOTE_ADDR'];
$id = $_POST['id'];
$type = $_POST['type'];
$exist = "select id from voted where id = '$id' and ip = '$ip'";
$exist_run = mysql_query($exist);

$alreadyExist = mysql_num_rows($exist_run);

	if($alreadyExist==0)
	{
	if($_POST['id']!='' && $_POST['type']!=''){
		
		
		if($type == 'like')
		{
			$query_like = "update posts set liked = liked + 1 where id = $id";
			$query_like_count = "select liked from posts where id=$id limit 1";
			mysql_query($query_like);
			$num = mysql_fetch_row(mysql_query($query_like_count));
		}
		elseif ($_POST['type']=='unlike') {
			$query_unlike = "update posts set unliked = unliked + 1 where id = $id";
			$query_unlike_count = "select unliked from posts where id=$id limit 1";
			mysql_query($query_unlike);
			$num = mysql_fetch_row(mysql_query($query_unlike_count));
			
		} 

		echo $num[0];
		mysql_query("insert into voted values ('$id', '$ip')");
	}
}
else
{
	echo "You Already Voted This";
}
?>
