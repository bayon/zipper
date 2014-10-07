<!--   Location:http://www.gen-x-design.com/archives/create-a-rest-api-with-php/-->

<?php 
echo('work');

	function processRequest()
	{
		// get our verb
		//$request_method = strtolower($_SERVER['REQUEST_METHOD']);
		$request_method =  $_SERVER['REQUEST_METHOD'] ;
		$return_obj		= new RestRequest();
		// we'll store our data here
		$data			= array();

		switch ($request_method)
		{
			// gets are easy...
			case 'get':
				$data = $_GET;
				break;
			// so are posts
			case 'post':
				$data = $_POST;
				break;
			// here's the tricky bit...
			case 'put':
				// basically, we read a string from PHP's special input location,
				// and then parse it out into an array via parse_str... per the PHP docs:
				// Parses str  as if it were the query string passed via a URL and sets
				// variables in the current scope.
				parse_str(file_get_contents('php://input'), $put_vars);
				$data = $put_vars;
				break;
		}

		// store the method
		$return_obj->setMethod($request_method);

		// set the raw data, so we can access it if needed (there may be
		// other pieces to your requests)
		$return_obj->setRequestVars($data);

		if(isset($data['data']))
		{
			// translate the JSON to an Object for use however you want
			$return_obj->setData(json_decode($data['data']));
		}
		return $return_obj;
	}

?>

<?php 
/*Processing the Request*/
	 function processRequest()
	{
		// get our verb
		//$request_method = strtolower($_SERVER['REQUEST_METHOD']);
		$request_method =  $_SERVER['REQUEST_METHOD'] ;
		$return_obj		= new RestRequest();
		// we'll store our data here
		$data			= array();

		switch ($request_method)
		{
			// gets are easy...
			case 'get':
				$data = $_GET;
				break;
			// so are posts
			case 'post':
				$data = $_POST;
				break;
			// here's the tricky bit...
			case 'put':
				// basically, we read a string from PHP's special input location,
				// and then parse it out into an array via parse_str... per the PHP docs:
				// Parses str  as if it were the query string passed via a URL and sets
				// variables in the current scope.
				parse_str(file_get_contents('php://input'), $put_vars);
				$data = $put_vars;
				break;
		}

		// store the method
		$return_obj->setMethod($request_method);

		// set the raw data, so we can access it if needed (there may be
		// other pieces to your requests)
		$return_obj->setRequestVars($data);

		if(isset($data['data']))
		{
			// translate the JSON to an Object for use however you want
			$return_obj->setData(json_decode($data['data']));
		}
		return $return_obj;
	}

?>

<?php 
/**/
$data = RestUtils::processRequest();

switch($data->getMethod)
{
	case 'get':
		// retrieve a list of users
		break;
	case 'post':
		$user = new User();
		$user->setFirstName($data->getData()->first_name);  // just for example, this should be done cleaner
		// and so on...
		$user->save();
		break;
	// etc, etc, etc...
}

?>

<?php /*Sending the Response*/
	 function sendResponse($status = 200, $body = '', $content_type = 'text/html')
	{
		$status_header = 'HTTP/1.1 ' . $status . ' ' . RestUtils::getStatusCodeMessage($status);
		// set the status
		header($status_header);
		// set the content type
		header('Content-type: ' . $content_type);

		// pages with body are easy
		if($body != '')
		{
			// send the body
			echo $body;
			exit;
		}
		// we need to create the body if none is passed
		else
		{
			// create some body messages
			$message = '';

			// this is purely optional, but makes the pages a little nicer to read
			// for your users.  Since you won't likely send a lot of different status codes,
			// this also shouldn't be too ponderous to maintain
			switch($status)
			{
				case 401:
					$message = 'You must be authorized to view this page.';
					break;
				case 404:
					$message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
					break;
				case 500:
					$message = 'The server encountered an error processing your request.';
					break;
				case 501:
					$message = 'The requested method is not implemented.';
					break;
			}

			// servers don't always have a signature turned on (this is an apache directive "ServerSignature On")
			$signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

			// this should be templatized in a real-world solution
			$body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
						<html>
							<head>
								<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
								<title>' . $status . ' ' . RestUtils::getStatusCodeMessage($status) . '</title>
							</head>
							<body>
								<h1>' . RestUtils::getStatusCodeMessage($status) . '</h1>
								<p>' . $message . '</p>
								<hr />
								<address>' . $signature . '</address>
							</body>
						</html>';

			echo $body;
			exit;
		}
	}

?>

<?php /**/
switch($data->getMethod)
{
	// this is a request for all users, not one in particular
	case 'get':
		$user_list = getUserList(); // assume this returns an array

		if($data->getHttpAccept == 'json')
		{
			RestUtils::sendResponse(200, json_encode($user_list), 'application/json');
		}
		else if ($data->getHttpAccept == 'xml')
		{
			// using the XML_SERIALIZER Pear Package
			$options = array
			(
				'indent' => '     ',
				'addDecl' => false,
				'rootName' => $fc->getAction(),
				XML_SERIALIZER_OPTION_RETURN_RESULT => true
			);
			$serializer = new XML_Serializer($options);

			RestUtils::sendResponse(200, $serializer->serialize($user_list), 'application/xml');
		}

		break;
	// new user create
	case 'post':
		$user = new User();
		$user->setFirstName($data->getData()->first_name);  // just for example, this should be done cleaner
		// and so on...
		$user->save();

		// just send the new ID as the body
		RestUtils::sendResponse(201, $user->getId());
		break;
}

?>


<?php /*Wrapping UP*/
			// figure out if we need to challenge the user
			if(empty($_SERVER['PHP_AUTH_DIGEST']))
			{
				header('HTTP/1.1 401 Unauthorized');
				header('WWW-Authenticate: Digest realm="' . AUTH_REALM . '",qop="auth",nonce="' . uniqid() . '",opaque="' . md5(AUTH_REALM) . '"');

				// show the error if they hit cancel
				die(RestControllerLib::error(401, true));
			}

			// now, analayze the PHP_AUTH_DIGEST var
			if(!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) || $auth_username != $data['username'])
			{
				// show the error due to bad auth
				die(RestUtils::sendResponse(401));
			}

			// so far, everything's good, let's now check the response a bit more...
			$A1 = md5($data['username'] . ':' . AUTH_REALM . ':' . $auth_pass);
			$A2 = md5($_SERVER['REQUEST_METHOD'] . ':' . $data['uri']);
			$valid_response = md5($A1 . ':' . $data['nonce'] . ':' . $data['nc'] . ':' . $data['cnonce'] . ':' . $data['qop'] . ':' . $A2);

			// last check..
			if($data['response'] != $valid_response)
			{
				die(RestUtils::sendResponse(401));
			}

?>