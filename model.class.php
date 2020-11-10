<?php

class Model
{
	private $table = "tbl_siswa";
	private $db;

	public function __construct() {
		$this->db = new Database();
	}

	public function get() {
		$query = "SELECT * FROM $this->table";
		return $this->db->query($query)->execute()->fetchAll();
	}
}