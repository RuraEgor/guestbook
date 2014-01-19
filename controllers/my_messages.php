<?php
function my_messages_action()
{	
	// the check open of the session
	if ( empty($_SESSION['sess']) )
	{
		header ("Location: ".BASE_URL."/index.php/login");
	}
	else
	{
		if ( count($_POST) > 0 )
		{
			// destruction of session
			if( isset($_POST['destroy']) ) 
			{	
				header ("Location: ".BASE_URL."/index.php/login");
				unset($_SESSION['sess']);
				session_destroy();
			}
			
			// user delete messages
			elseif ( isset($_POST['delete_messages'] ) && !empty( $_POST['delete']) )
			{
				if ( delete_messages($_POST) )
				{
					flash( 'The messages have been deleted!', 'alert alert-success' );
					
					header ("Location: ".BASE_URL."/index.php/my_messages?status=success");
					exit;
				}
				else
				{
					flash( 'A communication problem. The messages were not removed!', 'alert alert-danger' );
					
					header ("Location: ".BASE_URL."/index.php/my_messages?status=error");
					exit;
				}
			}
			
			// user delete message
			elseif ( !isset($_POST['delete_messages'] ) && !empty( $_POST['delete']) )
			{
				if ( delete_message($_POST) )
				{	
					flash( 'The message has been deleted!', 'alert alert-success' );
					
					header ("Location: ".BASE_URL."/index.php/my_messages?status=success");
					exit;
				}
				else
				{	
					flash( 'A communication problem. The message was not added!', 'alert alert-danger' );
				
					header ("Location: ".BASE_URL."/index.php/my_messages?status=error");
					exit;
				}
			}
		}
		
		// print all messages one user
		$messages = print_my_messages() ;
		require 'views/my_messages.php';

	}
}

?>