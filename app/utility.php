<?php
/** 
* author Fiona
* MVC utility class
*/

class Utility {


    /* check authentication details */
	public function auth($user,$pass){
        // default is bad login
        $auth = false;
        $username = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

        if(('user' == $user) & ('pass' == $pass)){
            $auth = true;
        }
        
	}

    public function checkInput($classID, $route, $id2, $route2){
    // code 

    }

    /* function to parse url string */  // need to parse route / student and route/ answers

    public function toLowerCase($classID, $route, $id2, $route2){
    // code 

    }

    /* function to convert response string to XML */

    public function arrayToXML($responseBody,$xmlData){
    // code

    }

}

 ?>