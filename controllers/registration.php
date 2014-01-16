<?php
function registration_action ()  
{
   // if data form is submitted
   if ( count($_POST) > 0 )   
   {	
		// validate data
		$errors = validate($_POST);
		
		if ( empty($errors) )
		{
            // check the user's login, add new user, redirect to guestbook
			if ( add_new_user($_POST) )
            {header ("Location: ".BASE_URL."/index.php/book?status=success");
			exit;
            }
            else
            {header ("Location: ".BASE_URL."/?status=error");
			exit;
            }
		}
	   else
		{
			// show registration form with error
			render_view($errors);
		}	   
   }
   else
   {
        // show registration form
        render_view();
   }       
}

/**
 * @param array $data
 * @return array $errors. If $errors is empty  data is valid
 */
 
function validate($data) {

	$errors = array();
		
	$data['email'] = ($_POST['email']);
	$data['email'] = data_checking($data['email']);
	
	$data['pass'] = ($_POST['pass']);
	$data['pass'] = data_checking($data['pass']);
	
	$data['login'] = ($_POST['login']);
	$data['login'] = data_checking($data['login']);
		
		
	if ( empty($data['login']) )
	{	
		$errors['login'][] = "Login field is required" ;
	}

	// check login to the repeat
	if ( db_check_the_login($data) )
	{	
		$errors['login'][] = "This Username registered! Use another!" ;
	}
	
	
	
	if ( empty($data['pass']) )
	{	
		$errors['pass'][] = "Password field is required" ;
	}
	
	// check password  to the length
	if ( strlen( $data['pass'] ) <= 5 && $data['pass']!="" )
	{	
		$errors['pass'][] = "Password should be more that 5 chars" ;
	}
	
	
	
	if ( empty($data['email']) )
	{	
		$errors['email'][] = "Email field is required" ;
	}	
	
	// check email to the repeat
	if ( db_check_the_email($data) )
	{		
		$errors['email'][] = "This E-Mail registered! Use another!" ;
	}
	

	// validate email
	if ( !filter_var($data['email'], FILTER_VALIDATE_EMAIL) && $data['email'] != "" )
	{		
		$errors['email'][] = "E-Mail is not valid!" ;
	}	

	return $errors;
}




/**
 * Add new User to DB
 * @param array $data
 * @return boolean true|false. True if user has been added, false othewise
 */
function add_new_user($data) {
	
	// add new User to DB
    return ( db_addition_new_user($data) );
	
}




/*
 * Render registration form with errors
 * @param array $errors
*/
function render_view( $errors = array() ) {

	extract($errors);

	require 'views/registration.php' ;
}

?>