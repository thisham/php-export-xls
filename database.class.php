<?php

class Database 
{
	private $dbh;
	private $stmt;

	function __construct($stmt = '') 
	{
		$dbo = (object) json_decode(file_get_contents(DIR . "/config.json"), true)["database"];

		try {
			$this->dbh = new PDO("mysql:host=$dbo->host;dbname=$dbo->name", $dbo->user, $dbo->pass);
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $th) {
			print "Error!: " . $th->getMessage() . "<br/>";
			die();
		}

		$this->stmt = (object) $stmt;
	}

	function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
		return $this;
	}

	function bind($var = [])
	{
		$valarr = array_values($var);
		$keyarr = array_keys($var);
		for ($i=0; $i < count($valarr); $i++) { 
			$valarr[$i] = htmlspecialchars($valarr[$i]);
			$this->stmt->bindParam($keyarr[$i], $valarr[$i]);
		}

		return $this;
	}

	function execute()
	{
		$this->stmt->execute();
		return $this;
	}

	function fetchOne()
	{
		$res = $this->stmt->fetch(PDO::FETCH_ASSOC);
		$this->close();
		return $res;
	}

	function fetchAll()
	{
		$res = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		$this->close();
		return $res;
	}

	function rowCount()
	{
		$res = $this->stmt->rowCount();
		$this->close();
		return $res;
	}

	function close()
	{
		$this->stmt->closeCursor();
	}
}

// $app = new Database();
// var_dump($app->query("SELECT * FROM dt_stu_students")->execute()->fetchAll());