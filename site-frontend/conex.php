<?php
	$db = mysqli_connect('192.168.100.20', 'renan', 'ifrn') or die ('Unable to connect. Check your connection parameters.');
	mysqli_select_db($db, 'siteics' ) or die(mysqli_error($db));
?>
