<?php

function message_action ()  
{
  if ( empty($_SESSION['sess']) )
  {
	header ("Location: ".BASE_URL."/index.php/login");
  }
  else
  {
   // if data form is submitted
   if ( isset($_POST['comment']) )   
   {	
		// validate data
		$errors = validate($_POST);
		
		if ( empty($errors) )
		{
            // check the user's login, add new user, redirect to guestbook
			if ( write_message($_POST) )
            {	
				flash( 'The message has been added!', 'alert alert-success' );
				
				header ("Location: ".BASE_URL."/index.php/book?status=success");
				exit;
            }
			else
            {
				flash( 'The message has been added!', 'alert alert-danger' );
				
				header ("Location: ".BASE_URL."/index.php/messegase?status=error");
				exit;
            }
		}
	   else
		{
			// show message form with error
			render_view($errors);
		}	   
   }
   else
   {
        // show message form
        render_view();
   }       
  }
}

/**
 * @param array $data
 * @return array $errors. If $errors is empty  data is valid
 */
 
function validate() {

	$errors = array();
	
	if ( empty($_POST['comment']) )
	{	
		$errors['comment'][] = "Text field are empty" ;
	}
	
	return $errors;
}




/**
 * @param array $data
 * @return boolean true|false. True if user has been added, false othewise
 */
function add_new_user($data) {
	
	// add new User to DB
    //return ( db_addition_new_user($data) );
	
}




/*
 * Render registration form with errors
 * @param array $errors
*/
function render_view( $errors = array() ) {

	extract($errors);
	
	require 'views/message.php' ;
}

?>