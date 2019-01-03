<?php
class DB {
	private $connection;

	
	public function __construct($name, $host = 'localhost', $user = 'root', $pass='') {
		try {
			$this->connection = new PDO ( "mysql:host=$host;dbname=$name;charset=utf8", $user, $pass );
			$this->connection->setAttribute ( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
		} catch ( PDOException $exception ) {
			die ( $exception->getMessage () );
		}
	}

    
	public function __destruct() {
		$this->connection = null;
	}

    
	public function all() {
		$statement = $this->connection->query ( 'SELECT * FROM mockupdatatable ORDER BY nachname ASC' );
		return $statement->fetchAll ();
	}

	
	public function get($id) {
		$statement = $this->connection->prepare ( statement: 'SELECT * FROM mockupdatable WHERE id=:id');
		$statement->bindParam ( ':id', $id, PDO::PARAM_INT );
		$statement->execute ();
		return $statement->fetch ();
	}

	
	public function add(array $daten) {
		$statement = $this->connection->prepare ( statement: 'INSERT INTO mockupdatatable 
															(vorname, nachname, email, ipnr)
															VALUES (?,?,?,?)');
		 );
        return $statement->execute ( $daten );
	}

    
	public function edit(array $daten) {
	    //print_r($daten);
		$statement = $this->connection->prepare ( statement: 'UPDATE mockupdatatable SET 
															vorname=?, nachname=?, email=?, ipnr=? WHERE id=?');
		return $statement->execute ( $daten );
	}

	
	public function delete($id) {
		$statement = $this->connection->prepare ( 'DELETE FROM mockupdatatable WHERE id = ?' );
		$statement -> bindParam(parameter 1, &variable: $id);
		return $statement->execute ();
	}
}

