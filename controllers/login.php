<?php

function login_action ()  
{
   // if data form is submitted
   if ( count($_POST) > 0 )   
   {	
		// validate data
		$errors = validate($_POST);
		
		if ( empty($errors) )
        {    
			// opening of the session
        	login($_POST);
			
			header ("Location: ".BASE_URL."/index.php/book?status=success");
			exit;
        }
		else
		{
			// show login form with error
			render_view($errors);
		}
		
   }
   else
   {
        // show login form
        render_view();
   }       
}

/**
 * @param array $data
 * @return array $errors. If $errors is empty  data is valid
 */
 
function validate($data) {

	$errors = array();
		
	$data['pass'] = ($_POST['pass']);
	$data['pass'] = data_checking($data['pass']);

	$data['login'] = ($_POST['login']);
	$data['login'] = data_checking($data['login']);
		
	if ( empty($data['login']) )
	{	
		$errors['login'][] = "Login field is required" ;
	}

	
	if ( empty($data['pass']) )
	{	
		$errors['pass'][] = "Password field is required" ;
	}
	
	
	// check login and pass
	if ( !db_check_pass_and_login($data) && !$data['login'] == "" && !$data['pass'] == "" )
	{	
		$errors['login'][] = "Login or Password is wrong" ;
	}

	return $errors;
}


/**
 * Opening of the session
 * @param array $data
 */
function login($data) {
	
	$_SESSION['sess'] = data_checking( $data['login'] );
}


/*
 * Render login form with errors
 * @param array $errors
*/
function render_view( $errors = array() ) {

	extract($errors);
	
	require 'views/login.php' ;
}

?>