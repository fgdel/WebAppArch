<?php
/**
 * @author Fiona
 * definition of the Student DAO (database access object)
 */

class StudentDAO {
	private $dbManager;
	public function __construct( $DBMan) {
		$this->dbManager = $DBMan;
	}

	function getStudentAnswers($classID=null, $id2=null) {
	/* user `id_user`, `id_question`, `answered_value`, `date`, `classID`

		/* if class and user IDs are passed */
		if ($classID!=NULL && $id2=!null){
			/* define statement to retrieve class by ID*/
			$stmt=$this->dbManager->prepareQuery("SELECT a.id_user, a.id_question, a.answered_value, a.classID,
                q.id, ql.title, l.id FROM  answers a, questions q, questions_in_languages ql, languages l, 
                JOIN a:id_question = q.id, JOIN ql:id_question = q:id, JOIN l:id = ql:id_language
                WHERE classID=? AND id2=?");

			/* bind id value */
			$this->dbManager->bindValue($stmt, 1, $classID, PDO::PARAM_INT);
 			$this->dbManager->bindValue($stmt, 2, $id2, PDO::PARAM_INT);
           
		} 

        /* execute query and return results */
		$result = $this->dbManager->executeQuery ( $stmt );
		$results = $this->dbManager->fetchResults ( $stmt );
		return $results;

	}

	function getStudentAnsAvg($classID=null, $id2=null) {
	/* `id_user`, `id_question`, `answered_value`, `date`, `classID`

		/* ID passed */
		if ($classID=!null && $id2=!null){
			/* define statement to get student's average answer result for a class */
			$stmt=$this->dbManager->prepareQuery("SELECT AVG(answered_value) as Average 
                FROM answers WHERE classID=? AND id2=? GROUP BY id_user");

			/* bind id value */
		    $this->dbManager->bindValue($stmt, 1, $classID, PDO::PARAM_INT);
 		    $this->dbManager->bindValue($stmt, 2, $id2, PDO::PARAM_INT);
        }

        /* execute query and return results */
		$result = $this->dbManager->executeQuery ( $stmt );
		$results = $this->dbManager->fetchResults ( $stmt );
		return $results;

	}

	function getStudentAnsStdDev ($classID=null, $id2=null) {
	    /* `id_user`, `desc_user`, `gender`, `born`, `mothertongue`, `classID`

		/* define statement to retrieve all students for a class */
		$stmt=$this->dbManager->prepareQuery("SELECT STDEV(answered_value) as Std Dev
				FROM answers.id_user WHERE classID=? AND id2=? ");

		/* bind id value */
		$this->dbManager->bindValue($stmt, 1, $classID, PDO::PARAM_INT);
 		$this->dbManager->bindValue($stmt, 2, $id2, PDO::PARAM_INT);

		/* execute and return results */
		$this->dbManager->executeQuery ($stmt);
		$results = $this->dbManager->fetchResults ( $stmt );
		return $results;

	}
}
?>
