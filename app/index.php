<?php
/** 
* author Fiona 
* MVC APP - index
*/

// require files
require_once "../Slim/Slim.php";


// initialise Slim
Slim\Slim::registerAutoloader ();
$app = new \Slim\Slim(); // slim run-time object


require_once "DB/pdoDbManager.php";
require_once "DB/DAO/ClassDAO.php";
require_once "DB/DAO/StudentDAO.php";
require_once "DB/DAO/AnswersDAO.php";
require_once "config/config.inc.php"; // include configuration file

include "Model.php";
include "Controller.php";
include "View.php";

function authenticate(\Slim\Route $route) {

	$app = \Slim\Slim::getInstance();

	$headers = $app->request->headers;
	$action = "ACTION AUTHENTICATE";
	if(!($headers['user'] == USERNAME && $headers['pass']==PASSWORD)){
		$app->halt(401);	
	} else {
		return TRUE;
    	}

	echo $view->output();	

};

$app->map ( "/classes(/:classID)",  "authenticate", 
	function ($classID = null) 
	use($app) { //router 

	$headers = $app->request->headers();
	$format = strtoupper ($headers['format']);
	$httpMethod = $app->request->getMethod(); // returns HTTP request method
	$action = null;

	//toLowerCase($classID, $route, $id2, $route2);

	// set boolean value for route id variables
	$classIDExists = !empty($classID);
	$ID2Exists = !empty($id2);
	$routeExists = !empty($route);
	$route2Exists = !empty($route2);

	// initialisations
	$responseBody = null;
	$responseCode = null;

	switch ($httpMethod) {
		case "GET" :
			if ( !$classIDExists && ( !$routeExists )){
				// 1. /classes
				// if no id passed in url return full list
				$action = "ACTION_RETRIEVE_ALL_CLASSES";

				// 2. /classes/ID
				//if valid classID and no other route return class details
				} else if ( $classIDExists && ( !$routeExists )){
					$action = "ACTION_RETRIEVE_A_CLASS";
				
				// 3. /classes/ID/students
				// if valid classID and student route exists return class details
				} else if ( $classIDExists && ( $route2Exists )){
					$action = "ACTION_RETRIEVE_A_CLASS";

				// 4. /classes/ID/students/ID2
				// if valid classID, student route and ID exists return student answers
				} else if ( $classIDExists && $ID2Exists && $route2Exists && $route2 == students){
					$action = "ACTION_RETRIEVE_STUDENT_ANSWERS_FOR_CLASS";
			
				// 5. /classes/ID/students/ID2/avg
				} else if ( $classIDExists && $ID2Exists && $route2Exists && $route2 == students/avg){
					$action = "ACTION_RETRIEVE_STUDENT_ANS_AVG_FOR_CLASS";

				// 6. /classes/ID/students/ID2/std
				} else if ( $classIDExists && $ID2Exists && $route2Exists && $route2 == students/std){
					$action = "ACTION_RETRIEVE_STUDENT_ANS_AVG_FOR_CLASS";

				// 7. /classes/ID/answers/ID2/avg
				} else if ( $classIDExists && $ID2Exists && $route2Exists && $route2 == answers/avg){
					$action = "ACTION_RETRIEVE_STUDENT_ANS_AVG_FOR_CLASS";

				// 8. /classes/ID/answers/ID2/std
				} else if ( $classIDExists && $ID2Exists && $route2Exists && $route2 == answers/std){
					$action = "ACTION_RETRIEVE_STUDENT_ANS_AVG_FOR_CLASS";

				// 9. /classes/ID/answers/avg
				} else if ( $classIDExists && (!$ID2Exists) && $route2Exists && $route2 == answers/avg){
					$action = "ACTION_RETRIEVE_STUDENT_ANS_AVG_FOR_CLASS";
	
				} else {
				// if ClassID not valid, bad request
				$responseCode = HTTPSTATUS_BADREQUEST;
				}

		break; 
			
		case "POST" :
			// no functionality required
				// if input : unauthorised request
				$responseCode = HTTPSTATUS_UNAUTHORIZED;
		break;

		case "PUT" :
			// no functionality required
				// if input : unauthorised request
				$responseCode = HTTPSTATUS_UNAUTHORIZED;
		break;

		case "DELETE" :
			// no functionality required
				// if input : unauthorised request
				$responseCode = HTTPSTATUS_UNAUTHORIZED;
		break;

				if (!empty ( $result ) ){
					$responseBody = $result;
					$responseCode = HTTPSTATUS_OK;
					} else {
					//if no class content indicate No Content
					$responseCode = HTTPSTATUS_NOCONTENT;
					}

    }

	$model = new Model();
	$controller = new Controller($model, $action, $classID);
	$view = new View($model,$controller);


	$responseBody = $view->getOutput();
	$responseCode = $view->getStatus();

	// return response to client as a json string

	$app->response->write ( json_encode ( $responseBody )); // this is the body of the response

	$params = array( "id"=>$classID,"id2"=>$id2 );


//	header($responseCode);
//	$app->response->status ( $responseCode );


})->via ( "GET" );

$app->run ();



?>