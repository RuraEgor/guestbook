<?phprequire_once 'config.php';require_once 'models/all_date.php';$connect=open_database_connection();if($connect == true){// route the request internally$uri = $_SERVER['REQUEST_URI'];//print $uri;if (BASE_URL.'/'== $uri || BASE_URL.'/?status=error' == $uri || BASE_URL.'/index.php' == $uri) {	require_once 'models/users.php';	require_once 'controllers/registration.php';	registration_action();} elseif ( BASE_URL.'/index.php/book' == $uri || BASE_URL.'/index.php/book?status=success' == $uri || BASE_URL.'/index.php/book?status=error' == $uri) {	require_once 'models/messages.php';	require_once 'controllers/book.php';    book_action();} elseif (BASE_URL.'/index.php/login' == $uri) {require_once 'models/users.php';require_once 'controllers/login.php';	login_action();} elseif ( BASE_URL.'/index.php/message' == $uri || BASE_URL.'/index.php/messegase?status=error' == $uri ) {	require_once 'models/messages.php';	require_once 'controllers/message.php';	message_action();}elseif ( BASE_URL.'/index.php/my_messages' == $uri || BASE_URL.'/index.php/my_messages?status=error' == $uri || BASE_URL.'/index.php/my_messages?status=success') {	require_once 'models/messages.php';	require_once 'controllers/my_messages.php';	my_messages_action();}  else {    //header('Status: 404 Not Found');    echo '<html><body><h1>Page Not Found</h1></body></html>';}} else { echo '<html><body><h1>No connection to the database!</h1></body></html>';}?>