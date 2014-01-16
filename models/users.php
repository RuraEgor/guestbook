<?php

function db_check_the_email($data) {
  
	$res =mysql_query("SELECT * FROM `users`") ;

	while ($row = mysql_fetch_assoc($res))
	{
		//$row['email'] = htmlspecialchars($row['email']);

		if ($data['email']==$row['email'])
		{
			return true;
			break;
		} 
	}
	
	return false;
}



function db_check_the_pass($data) {
  
	$res =mysql_query("SELECT * FROM `users`");
	
	while ($row = mysql_fetch_assoc($res))
	{
		//$data['pass']=html_entity_decode($data['pass']);
		$data['pass'] = md5($data['pass']);
		//$data['pass'] = htmlspecialchars($data['pass']);
		
		//$row['pass'] = htmlspecialchars($row['pass']);
		if ($data['pass']==$row['pass'])
		{
			return true;
			break;
		} 
	}
	
	return false;
}



function db_check_the_login($data) {
  
	$res =mysql_query("SELECT * FROM `users`");
	
	while ($row = mysql_fetch_assoc($res))
	{
		//$row['login'] = htmlspecialchars($row['login']);
		if ($data['login']==$row['login'])
		{
			return true;
			break;
		} 
	}
	
	return false;
}


function db_addition_new_user($data) {
	
	$data['email'] = data_checking($data['email']);
	$email=$data['email'];
	
	$data['pass'] = data_checking($data['pass']);
	$pass=$data['pass'];
	
	$data['login'] = data_checking($data['login']);
	$login=$data['login'];

	//$email=html_entity_decode($email);
	$email = mysql_real_escape_string($email);

	//$pass=html_entity_decode($pass);
	$pass = md5($pass);
	$pass = mysql_real_escape_string($pass);

	//$login=html_entity_decode($login);
	$login = mysql_real_escape_string($login);

	mysql_query("INSERT INTO `users` (`email`, `pass`,`login`) VALUES ('$email', '$pass','$login' )");


	if ( db_check_the_login($data) )
		{
			$_SESSION['sess'] = $data['login'];
			return true;
		}	
		else
		{
			return false;
		}	
}


function db_check_pass_and_login()  {

	$res =mysql_query("SELECT * FROM `users`");
	
	while ($row = mysql_fetch_assoc($res))
	{
		$data['pass'] = ($_POST['pass']);
		$data['pass'] = data_checking($data['pass']);
		
		$data['login'] = ($_POST['login']);
		$data['login'] = data_checking($data['login']);
		

		$data['pass'] = md5($data['pass']);

		if ( $data['pass']==$row['pass'] && $data['login']==$row['login'] )
		{
			return true;
			break;
		} 
	}
	
	return false;


}

?>