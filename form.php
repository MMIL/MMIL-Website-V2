<?php
include 'config.php';
if($_POST['name']=="")
{
	echo "<script type='text/javascript'>
	alert('Name can not be blank');
	window.location.href='form.html';
	</script>";
}
else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['name']))
{
	echo "<script type='text/javascript'>
	alert('Speacial chracter is not allowed in Name');
	window.location.href='form.html';
	</script>";
}
else if($_POST['rollnumber']=="")
{
	echo "<script type='text/javascript'>
	alert('Roll Number can not be blank');
	window.location.href='form.html';
	</script>";
}
else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['rollnumber']))
{
	echo "<script type='text/javascript'>
	alert('Speacial chracter is not allowed in Roll Number');
	window.location.href='form.html';
	</script>";
}
else if($_POST['email']=="")
{
	echo "<script type='text/javascript'>
	alert('Email can not be blank');
	window.location.href='form.html';
	</script>";
}
else if(preg_match('/[\'^£$%&*()}{#~?><>,|=+¬-]/', $myemail))
{
	echo "<script type='text/javascript'>
	alert('Speacial chracter is not allowed in Email maddress');
	window.location.href='form.html';
	</script>";
}
else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
	echo "<script type='text/javascript'>
	alert('Invalid Email address');
	window.location.href='form.html';
	</script>";
}
else if($_POST['branch']=="")
{
	echo "<script type='text/javascript'>
	alert('Branch can not be blank');
	window.location.href='form.html';
	</script>";
}
else if($_POST['phone']!="" && !is_numeric($_POST['phone']))
{
	echo "<script type='text/javascript'>
	alert('Contact number can contain numbers only');
	window.location.href='form.html';
	</script>";
}
else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['branch']))
{
	echo "<script type='text/javascript'>
	alert('Speacial chracter is not allowed in Branch');
	window.location.href='form.html';
	</script>";
}
else if($_POST['year']=="")
{
	echo "<script type='text/javascript'>
	alert('Year can not be blank');
	window.location.href='form.html';
	</script>";
}
else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['year']))
{
	echo "<script type='text/javascript'>
	alert('Speacial chracter is not allowed in Year');
	window.location.href='form.html';
	</script>";
}
else if(!is_numeric($_POST['year']))
{
	echo "<script type='text/javascript'>
	alert('Year can be number only');
	window.location.href='form.html';
	</script>";
}
else
{
	$sql = "SELECT * FROM register WHERE email='".$_POST['email']."'";
	$result = mysql_query($sql);
	$count = mysql_num_rows($result);
	if ($count == 1)
	{
		echo "<script type='text/javascript'>
		alert('This Email already registered');
		window.location.href='form.html';
		</script>";
	}
	else
	{
		mysql_query("INSERT INTO register(regdate, name, roll, email, mob, branch, yr)
		VALUES (NOW(), '".mysql_real_escape_string($_POST['name'])."', '".mysql_real_escape_string($_POST['rollnumber'])."', '".mysql_real_escape_string($_POST['email'])."', 
		'".mysql_real_escape_string($_POST['phone'])."', '".mysql_real_escape_string($_POST['branch'])."', '".mysql_real_escape_string($_POST['year'])."')");
		
		echo "<script type='text/javascript'>
		window.location.href='form_complete.html';
		</script>";
	}
}
?>