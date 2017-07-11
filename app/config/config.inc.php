<?php
/* Authentication */
define ( "USERNAME", 'user' );
define ( "PASSWORD", 'pass' );

/* DB constants */
define ( "DB_HOST", 'localhost' );
define ( "DB_USER", 'root' );
define ( "DB_PASS", '' );
define ( "DB_NAME", 'DIT');
define ( "DB_CHARSET", 'utf8' );
define ( "DB_DEBUGMODE", false );
define ( "DB_VENDOR", 'mysql' ); 

/* HTTP status codes 2xx */
define ( "HTTPSTATUS_OK", 200 );
define ( "HTTPSTATUS_CREATED", 201 );
define ( "HTTPSTATUS_NOCONTENT", 204 );

/* HTTP status codes 3xx (with slim the output is not produced i.e. echo statements are not processed) */
define ( "HTTPSTATUS_NOTMODIFIED", 304 );

/* HTTP status codes 4xx */
define ( "HTTPSTATUS_BADREQUEST", 400 );
define ( "HTTPSTATUS_UNAUTHORIZED", 401 );
define ( "HTTPSTATUS_FORBIDDEN", 403 );
define ( "HTTPSTATUS_NOTFOUND", 404 );
define ( "HTTPSTATUS_REQUESTTIMEOUT", 408 );
define ( "HTTPSTATUS_TOKENREQUIRED", 499 );

/* HTTP status codes 5xx */
define ( "HTTPSTATUS_INTSERVERERR", 500 );

/* error messages */
 define ( "DB_ERRORMESSAGE ", "connection failed");

 /* possible controller actions */
define ("ACTION_AUTHENTICATE", 1);
define ("ACTION_RETRIEVE_ALL_CLASSES", 2);
define ("ACTION_RETRIEVE_A_CLASS", 3);
define ("ACTION_RETRIEVE_CLASS_STUDENT_LIST", 4);
define ("ACTION_RETRIEVE_STUDENT_ANSWERS_FOR_CLASS", 5);
define ("ACTION_RETRIEVE_STUDENT_ANS_AVG_FOR_CLASS", 6);
define ("ACTION_RETRIEVE_STUDENT_STD-DEV_FOR_CLASS", 7);
define ("ACTION_RETRIEVE_ANSWERS_AVERAGE_FOR_CLASS", 8);
define ("ACTION_RETRIEVE_ANSWERS_STD-DEV_FOR_CLASS", 9);
define ("ACTION_RETRIEVE_ANSWERS_AVG_FOR_Q", 10);

?>