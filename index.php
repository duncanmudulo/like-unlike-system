<!DOCTYPE html>
<html>
<head>
	<title>Like/Unlike System</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script>
		function doAction(id, type){
			$.post('doAjax.php', {id:id, type:type}, function(data){
				if(isNaN(parseFloat(data)))
				{
					alert(data);
				}
				else
				{
				$('#'+id+'_'+type+'s').text(data);
			}
			});
		}


	</script>
</head>
<body>
	<?php
	include "db.php";
	$id = 1; //default post id
	$query = "select * from posts";
	$result = mysql_query($query);
	$data = mysql_fetch_object($result);

	?>
	<a href="javascript:;" onclick="doAction('<?php echo $id;?>','like');">Like (<span id="<?php echo $id; ?>_likes"><?php echo $data->liked; ?></span>)</a>
	<a href="javascript:;" onclick="doAction('<?php echo $id;?>','unlike');">Unlike (<span id="<?php echo $id; ?>_unlikes"><?php echo $data->unliked; ?></span>)</a>
</body>


</html>
