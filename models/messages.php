<?php

function print_all_messages() {

	$res_mess = mysql_query("SELECT * FROM `messages` ORDER BY `id` DESC ") ;
	
	$messages = array();
	
	if ( !empty($res_mess) ) 
	{
		while ( $row_mess =  mysql_fetch_array($res_mess) ) 
		{	
			$res_user = mysql_query("SELECT * FROM `users` ") ;
	
			while ( $row_user =  mysql_fetch_array($res_user) )
			{
				if ( $row_mess['login'] == $row_user['id'] )
				{	
					$messages[][ $row_mess['id'] ] [ $row_user['login'] ]  = $row_mess['comment'];
				}
			}
		}
	}
	else
	{
		$messages[][ "" ] = "Messages is not";
	}

return $messages;

}




function print_my_messages() {

	$messages=array ();

	$res_user = mysql_query("SELECT * FROM `users` ") ;
	
	while ( $row_user =  mysql_fetch_array($res_user) ) 
	{
		if ( $_SESSION['sess'] == $row_user['login'] )
		{
			$res_mess = mysql_query("SELECT * FROM `messages` ORDER BY `id` DESC ") ;
			
			while ( $row_mess =  mysql_fetch_array($res_mess) )
			{	
				if ( $row_user['id'] == $row_mess['login'] ) 
				{	
					$messages[][ $row_mess['id'] ] [ $row_user['login'] ]  = $row_mess['comment'];
				}
			}
		}
	}
	
return $messages;

}




function write_message($comment) {
	
	$res_user = mysql_query("SELECT * FROM `users` ") ;
	
	while ( $row_user =  mysql_fetch_array($res_user) ) 
	{
	
		if ( $_SESSION['sess'] == $row_user['login'] )
		{	
			$comment = data_checking( $_POST['comment'] );
			$comment = mysql_real_escape_string( $comment );
			
			mysql_query("INSERT INTO `messages` (`login`, `comment`) VALUES (".$row_user['id'].", '$comment')");
		
		
			$res =mysql_query("SELECT * FROM `messages` ORDER BY `id` DESC");
	
			while ($row = mysql_fetch_assoc($res))
			{	
				$comment = data_checking( $comment );
				if ( $row['comment'] == $comment && $row_user['id'] == $row['login'] )
				{
					return true;
				} 
				else
				{
					return false;
				}
				break;
			}	
		}		
	}	
}



function delete_message($_POST) {

	$d = 'false';

	$res_user = mysql_query(" SELECT * FROM `users` ") ;
	
	while ( $row_user = mysql_fetch_array($res_user) )
	{
		if ( $_SESSION['sess'] == $row_user['login'] )
		{
			$login = $row_user['id'];
			break;
		}
	}
	
	if( !empty($_POST['delete']) ) 
	{	
		$res_mess = mysql_query(" SELECT * FROM `messages` ") ;

		while ( $ros_mess = mysql_fetch_array($res_mess) )
		{
			foreach ($_POST['delete'] as $lang)
			{
				if ( $lang == $ros_mess['id'] )
				{	
					$d = 'true';
				}
			}
		}
	}
		
	$res_mess = mysql_query(" SELECT * FROM `messages` ") ;

	while ( $ros_mess = mysql_fetch_array($res_mess) )
	{
		if ( $_POST['delete'][0] == $ros_mess['id'] && $login == $ros_mess['login'])
		{	
			mysql_query("DELETE FROM `messages` WHERE `messages`.`id` = ".$ros_mess['id']." ");
			break;
		}
	}
	
	
	$res_mess = mysql_query(" SELECT * FROM `messages` ") ;
	
	while ( $ros_mess = mysql_fetch_array($res_mess) )
	{	
		if ( $_POST['delete'][0] == $ros_mess['id']  )
		{
			$d = 'false';
			break;
		}
	}

	if ( $d == 'false' ) { return false; } else { return true; } ;

}




function delete_messages($_POST) {

	$d='false';
	
	$res_user = mysql_query(" SELECT * FROM `users` ") ;
	
	while ( $row_user = mysql_fetch_array($res_user) )
	{
		if ( $_SESSION['sess'] == $row_user['login'] )
		{
			$login = $row_user['id'];
			break;
		}
	}


	if( !empty($_POST['delete']) ) 
	{	
		$res_mess = mysql_query(" SELECT * FROM `messages` ") ;

		while ( $ros_mess = mysql_fetch_array($res_mess) )
		{
			foreach ($_POST['delete'] as $lang)
			{
				if ( $lang == $ros_mess['id'] )
				{	
					$d = 'true';
				}
			}
		}
	}
	
	
	if( !empty($_POST['delete']) ) 
	{	
		$res_mess = mysql_query(" SELECT * FROM `messages` ") ;

		while ( $ros_mess = mysql_fetch_array($res_mess) )
		{
			foreach ($_POST['delete'] as $lang)
			{
				if ( $lang == $ros_mess['id'] && $login == $ros_mess['login'])
				{	
					mysql_query("DELETE FROM `messages` WHERE `messages`.`id` = ".$ros_mess['id']." ");
				}
			}
		}
	}	

		$res_mess = mysql_query(" SELECT * FROM `messages` ") ;
		
		while ( $ros_mess = mysql_fetch_array($res_mess) )
		{	
			if ( $_POST['delete'][0] == $ros_mess['id'] )
			{
				$d = 'false';
				break;
			}
		}

	
	if ( $d == 'false' ) { return false; } else { return true; } ;
	
}

?>