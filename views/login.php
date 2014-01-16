	<!DOCTYPE html>
    <html>
    <head>
    <title>Sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="<?php echo BASE_URL ?>/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="<?php echo BASE_URL ?>/css/signin.css" rel="stylesheet" media="screen">
    </head>
    <body>


	<div class="container-fluid">

	  <form class="form-signin" method="post" action="<?php echo BASE_URL ?>/index.php/login" role="form">
		
		<h1 class="form-signin-heading">Please sign in</h1>

		<div class="<?php echo ( empty($errors) ) ? '' : "alert alert-danger" ?>" >
			  
		  <p class="text-center"><?php print (isset($login)) ? join("<br>",$login) : '' ?></p>
		  <p class="text-center"><?php print (isset($pass)) ? join("<br>",$pass) : '' ?></p>
				
		</div>

		<input class="form-control" type="text" name="login" autofocus="" placeholder="Username" value="<?php if (isset($_POST['login'])) { $data['login'] = data_checking( $_POST['login'] ) ; echo htmlspecialchars( $data['login'] );} else { echo '' ;} ?>">
		
		<input class="form-control" type="password" name="pass" placeholder="Password" value="">
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

	  </form>


	  <div class="text-center">OR</div>

	  <div class="form-signin"> 
		<a href="<?php echo BASE_URL ?>/" style="text-decoration: none">
		  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
		</a>
	  </div>


	</div>	
	
    </body>
    </html>