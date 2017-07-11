<?php
/**
 * @author Fiona
 * definition of the Class DAO (database access object)
 */

class ClassDAO {
	private $dbManager;
	public function __construct($DBMan) {
		$this->dbManager = $DBMan;
	}
	function getClass($classID=null) {
	/* classes `classID`, `title`, `activation_date`, `deactivation_date`)

		/* if ID is passed */
		if ($classID!=NULL){
		/* define statement to retrieve class by ID*/
		$stmt=$this->dbManager->prepareQuery("SELECT classID, title, (deactivation_date-activation_date)/60
				FROM classes WHERE classID=?");
		/* bind id value */
		$this->dbManager->bindValue($stmt, 1, $classID, PDO::PARAM_INT);
		} 

        /* execute query and return results */
		$result = $this->dbManager->executeQuery ( $stmt );
		$results = $this->dbManager->fetchResults ( $stmt );
		return $results;

	}

	function getAllClasses() {
	/* classes `classID`, `title`, `activation_date`, `deactivation_date`)

		/* define statement to retrieve all classes */
		$stmt=$this->dbManager->prepareQuery("SELECT classID, title, (deactivation_date-activation_date)/60
				AS Length FROM classes");
		
        /* execute query and return results */
		$result = $this->dbManager->executeQuery ( $stmt );
		$results = $this->dbManager->fetchResults ( $stmt );
		return $results;

	}

	function getClassStudentList($classID=null) {
	    /* user `id_user`, `desc_user`, `gender`, `born`, `mothertongue`, `classID`

		/* define statement to retrieve all students for a class */
		$stmt=$this->dbManager->prepareQuery("SELECT u.id_user, u.desc_user, u.gender, 
                u.born, u.mothertongue FROM users u JOIN classes c on 
                c.classID = u.classID WHERE c.classID=?");
		
        /* bind id value */
		$this->dbManager->bindValue($stmt, 1, $classID, PDO::PARAM_INT);

		/* execute and return results */
		$this->dbManager->executeQuery ($stmt);
		$results = $this->dbManager->fetchResults ( $stmt );
		return $results;

	}
}
?>
