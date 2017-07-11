<?php
/** 
* author Fiona
* MVC Controller - interaction manager
*/

class Controller 
{
    private $model, $action, $params;

    public function __construct($model, $action, $params) {
        $this->model = $model;
        $this->action = $action;
        $this->params = $params;

        // var_dump ("controller"); die();

        switch ($action){
            case "ACTION_AUTHENTICATE":
            //authentication
            $authentication = $this-> model-> auth($user,$pass);
            $this->output($this->model, $authentication);
            break;
            //retrieve from the model
             case "ACTION_RETRIEVE_ALL_CLASSES": 
            //retrieve list of all classes
            $retrieveAllClasses = $this-> model -> getAllClasses();
            $this->output($this->model, $retrieveAllClasses);
            break;

            case "ACTION_RETRIEVE_A_CLASS": 
            //retrieve details for a single class
            $retrieveClass = $this-> model -> getClass($classID);
            $this->output($this->model, $retrieveClass);
            break;

            case "ACTION_RETRIEVE_CLASS_STUDENT_LIST": 
            //retrieve list of students attending a class
            $retrieveClassStudentList = $this-> model -> getClassStudentList($classID);
            $this->output($this->model, $retrieveClassStudentList);
            break;

            case "ACTION_RETRIEVE_STUDENT_ANSWERS_FOR_CLASS": 
            //retrieve answers for a class from a particular student
            $retrieveStudentAnswers = $this-> model -> getStudentAnswers($classID, $id2);
            $this->output($this->model, $retrieveStudentAnswers);
            break;

            case "ACTION_RETRIEVE_STUDENT_ANS_AVG_FOR_CLASS": 
            //retrieve answers for a class from a particular student
            $retrieveStudentAnsAvg = $this-> model -> getStudentAnsAvg($classID, $id2);
            $this->output($this->model, $retrieveStudentAnsAvg);
            break;

            case "ACTION_RETRIEVE_STUDENT_ANS_STD-DEV_FOR_CLASS": 
            //retrieve answers for a class from a particular student
            $retrieveStudentAnsStdDev = $this-> model -> getStudentAnsStdDev($classID, $id2);
            $this->output($this->model, $retrieveStudentAnsStdDev);
            break;

            case "ACTION_RETRIEVE_ANSWERS_AVERAGE_FOR_CLASS": 
            //retrieve answers for a class from a particular student
            $retrieveAnswersAvg = $this-> model -> getAnswersAvg($classID, $id2);
            $this->output($this->model, $retrieveAnswersAvg);
            break;

            case "ACTION_RETRIEVE_ANSWERS_STD-DEV_FOR_CLASS": 
            //retrieve answers for a class from a particular student
            $retrieveAnswersStdDev = $this-> model -> getAnswersStdDev($classID, $id2);
            $this->output($this->model, $retrieveAnswersStdDev);
            break;

            case "ACTION_RETRIEVE_ANSWERS_AVG_FOR_Q": 
            //retrieve answers for a class from a particular student
            $retrieveAnswersAvgQ = $this-> model -> getAnswersAvgQ($classID);
            $this->output($this->model, $retrieveAnswersAvgQ);
            break;

        default: $model->setStatus(HTTPSTATUS_BADREQUEST);
        }
    }

    public function output($model,$result){
        // set HTTP Status Code
    	$model->setOutput($result);
        $out = $model->getOutput();
		if ($out==null){
			$model->setStatus(HTTPSTATUS_NOTFOUND);
		} else {
			$model->setStatus(HTTPSTATUS_OK);
		}
    }

}
?>

