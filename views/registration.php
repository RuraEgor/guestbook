	<!DOCTYPE html>
    <html>
    <head>
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="<?php echo BASE_URL ?>/css/bootstrap.css" rel="stylesheet" media="screen">
	
    </head>
    <body>
	

<div class="container-fluid">

	<div class="row">
	  <div class="col-sm-4 col-sm-offset-4">
	  
		<form method="post" class="form-signin" action="<?php echo BASE_URL ?>/" role="form">
		  
		  <div class="form-group">
		  
			<h1 class="form-signin-heading">Registration form</h1>
			
			  <div class="<?php echo ( empty($errors) ) ? '' : "alert alert-danger" ?>" >
			  
			    <p class="text-center"><?php print (isset($email)) ? join("<br>",$email) : '' ?></p>
				<p class="text-center"><?php print (isset($pass)) ? join("<br>",$pass) : '' ?></p>
				<p class="text-center"><?php print (isset($login)) ? join("<br>",$login) : '' ?></p>
				
			  </div>
			
		  </div>
		  
		  
		  <div class="form-group">
			<label for="exampleInputEmail1">Email</label>
			<input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" autofocus value="<?php if (isset($_POST['email'])) {$data['email'] = data_checking( $_POST['email'] ) ; echo htmlspecialchars( $data['email'] ) ;} else  
			{ echo '' ; }?>">
		  </div>
		  
		  <div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password" value="">
		  </div>
		  
		  <div class="form-group">
			<label for="exampleInputUsername1">Username</label>
			<input type="text" class="form-control" name="login" id="exampleInputUsername1" placeholder="Username" value="<?php if (isset($_POST['login'])) { $data['login'] = data_checking( $_POST['login'] ) ; echo htmlspecialchars( $data['login'] );} else { echo '' ;} ?>">
		  </div>
		  
		  <div class="form-group">
			<button type="submit" class="btn btn-lg btn-primary btn-default btn-block">Sign up</button>
		  </div>
	    
		</form>
	
		<p class="text-center">OR</p>

		<a href="<?php echo BASE_URL ?>/index.php/login" style="text-decoration: none">
		  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</a>

	
	  </div>
	</div>
	
    
</div>


    </body>
    </html>