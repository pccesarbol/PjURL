<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>MySQL Test Script</title>
<style>
	body { font-family: Verdana; font-size: 10pt; }
	td { font-size: 10pt; }
	th { font-size: 8pt; }
</style>
</head>
<body>

<?php


	if ( isset ( $_POST['submit'] ) ) {
?>
<table border="1" summary="" cellpadding="2" cellspacing="0" style="border-collapse: collapse;">
	<tr>
		<th bgcolor="#F2F2F2" colspan="2"><center><b>Connection Results</b></center></td>
	</tr>
<?

		if (!$link = @mysql_connect($_POST['mysql_hostname'], $_POST['mysql_username'], $_POST['mysql_password'])) {
?>
	<tr>
		<td>Connection:</td>
		<td bgcolor="red"><font color="white"><?php echo mysql_error(); ?></font></td>
	</tr>
<?
		} else {
?>
	<tr>
		<td>Connection:</td>
		<td bgcolor="green"><font color="white">Successful!</font></td>
	</tr>
<?
		}

		if (!$dblink = @mysql_select_db($_POST['mysql_database'], $link)) {
?>
	<tr>
		<td>Database Selection:</td>
		<td bgcolor="red"><font color="white"><?php echo mysql_error(); ?></font></td>
	</tr>
<?
		} else {
?>
	<tr>
		<td>Database Selection:</td>
		<td bgcolor="green"><font color="white">Successful!</font></td>
	</tr>
<?
		}

		@mysql_close($link);
?>
</table>
<?
	}

?>

<form method="post">

<table border="1" summary="" cellpadding="2" cellspacing="0" style="border-collapse: collapse;">
	<tr>
		<th bgcolor="#F2F2F2" colspan="2"><center><b>Enter Your MySQL Information</b></center></td>
	</tr>
	<tr>
		<td>MySQL Hostname</td>
		<td><input type="text" name="mysql_hostname" size="40" value="<?php echo $_POST['mysql_hostname']; ?>"></td>
	</tr>
	<tr>
		<td>MySQL Username</td>
		<td><input type="text" name="mysql_username" size="40" value="<?php echo $_POST['mysql_username']; ?>"></td>
	</tr>
	<tr>
		<td>MySQL Password</td>
		<td><input type="text" name="mysql_password" size="40" value="<?php echo $_POST['mysql_password']; ?>"></td>
	</tr>
	<tr>
		<td>MySQL Database</td>
		<td><input type="text" name="mysql_database" size="40" value="<?php echo $_POST['mysql_database']; ?>"></td>
	</tr>
	<tr>
		<td colspan="2"><center><input type="submit" name="submit" value="Submit"> <input type="reset" name="reset" value="Reset"></center></td>
	</tr>
</table>
</form>

</body>
</html>

