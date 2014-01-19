<?php
function book_action()
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
			
			// users delete messages
			elseif ( delete_message($_POST) )
			{
				flash( 'The message has been deleted!', 'alert alert-success' );
				
				header ("Location: ".BASE_URL."/index.php/book?status=success");
				exit;
			}
			else
			{
				flash( 'A communication problem. Message was not removed!', 'alert alert-danger' );
				
				header ("Location: ".BASE_URL."/index.php/book?status=error");
				exit;
			}
		}
		
		// print all messages
		$messages = print_all_messages() ;
		require 'views/book.php';
	}
}

?>