<?php
/**
 * @author Fiona
 * definition of the Answers DAO (database access object)
 */

class AnswersDAO {
	private $dbManager;
	public function __construct( $DBMan) {
		$this->dbManager = $DBMan;
	}

	function getClassAnsAvg($classID=null, $id2=null) {
	/* `id_user`, `id_question`, `answered_value`, `date`, `classID`

		/* ID passed */
		if ($classID=!null && $id2=!null){
			/* define statement to get average answer results for a class */
			$stmt=$this->dbManager->prepareQuery("SELECT AVG(answered_value) as Average 
                FROM answers WHERE classID=? AND id=?");

			/* bind id value */
		    $this->dbManager->bindValue($stmt, 1, $classID, PDO::PARAM_INT);
 		    $this->dbManager->bindValue($stmt, 2, $id2, PDO::PARAM_INT);
        }

        /* execute query and return results */
		$result = $this->dbManager->executeQuery ( $stmt );
		$results = $this->dbManager->fetchResults ( $stmt );
		return $results;

	}

	function getAnswersStdDev ($classID=null, $id2=null) {
	    /* `id_user`, `desc_user`, `gender`, `born`, `mothertongue`, `classID`

    	 ID passed */
		if ($classID=!null && $id2=!null){
			/* define statement to retrieve all students for a class */
			$stmt=$this->dbManager->prepareQuery("SELECT STDEV(answered_value) as Std Dev
				FROM answers.id_user WHERE classID=? AND id2=? ");

			/* bind id value */
			$this->dbManager->bindValue($stmt, 1, $classID, PDO::PARAM_INT);
 			$this->dbManager->bindValue($stmt, 2, $id2, PDO::PARAM_INT);
		}

		/* execute and return results */
		$this->dbManager->executeQuery ($stmt);
		$results = $this->dbManager->fetchResults ( $stmt );
		return $results;

	}


	function getAnswersAvg($classID=null) {
		/* retrieve the average of the answers, 
		associated to a certain class ID1, grouped by questionID)

    	 ID passed */
		if ($classID=!null){
			// define statement to get average answers for a question by id 
			$stmt=$this->dbManager->prepareQuery("SELECT AVG(answered_value) as Average for Class
                FROM answers WHERE classID=? GROUP BY id_question");

			// bind id value
			$this->dbManager->bindValue($stmt, 1, $classID, PDO::PARAM_INT);

		} 

        /* execute query and return results */
		$result = $this->executeQuery ( $stmt );
		$results = $this->dbManager->fetchResults ( $stmt );
		return $results;

	}

}

?>
