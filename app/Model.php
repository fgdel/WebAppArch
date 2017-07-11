<?php
/**
* author Fiona
* MVC App Model
*/

class Model {
    public $outputForView = null;
    public $dbManager = null;
    private $classDAO = null;
    private $studentDAO = null;
    private $answersDAO = null;
    private $status = null;

    public function __construct(){
        // create connection driver
        $this->dbManager = new pdoDbManager (); // create a run-time db manager
        $this->classDAO = new ClassDAO ( $this->dbManager );
        $this->studentDAO = new StudentDAO ( $this->dbManager );
        $this->answersDAO = new AnswersDAO ( $this->dbManager );    
        $this->dbManager->openConnection();            
    }

    public function __destruct(){
       // close DB connection
        $this->dbManager-> closeConnection();         
    }
    public function setOutput( $output ){
        $this->outputForView = $output;
    }
    public function getOutput(){
        return $this->outputForViiew;
    }

    /**
    *
    * @return HTTP status details
    */
    public function setStatus($status){
		$this->status = $status;
	}
	public function getStatus(){
		return $this->status;
	}

    /**
    *
    * @return the class details
    */
    public function getAllClasses(){
        return $this->classDAO->getAllClasses();
    }
    public function getClass(){
        $this->classDAO->getClass($classID);
    }
    public function getClassStudentList($classID){
        $this->classDAO->getClassStudentList();
    }

    /**
    *
    * @return the student details
    */
    public function getStudentAnswers($classID, $id2){
        return $this->studentDAO->getStudentAnswers($classID, $id2);
    }
    public function getStudentAnsAvg($classID, $id2){
        $this->studentDAO->getStudentAnsAvg($classID, $id2);
    }
    public function getStudentAnsStdDev($classID, $id2){
        $this->studentDAO->getStudentAnsStdDev($classID, $id2);
    }

    /**
    *
    * @return the answer details
    */
    public function getAnswersAvg($classID, $id2){
        return $this->answersDAO->getAnswersAvg($classID, $id2);
    }
    public function getAnswersStdDev($classID, $id2){
        $this->answersDAO->getAnswersStdDev($classID, $id2);
    }
    public function getAnswersAvgQ($classID){
        $this->answersDAO->getAnswersAvgQ($classID);
    }

}
?>

