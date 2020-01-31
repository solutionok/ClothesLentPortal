<?php

class rattings
{
	function __construct(){
		global $db;
		$this->db = $db;
	}

	public function add($ratings, $user, $product){
		$query = $this->db->prepare("INSERT INTO rattings (username, product, overall_rat) VALUES(:a, :b, :c)");
		$query->bindParam("a", $user);
		$query->bindParam("b", $product);
		$query->bindParam("c", $ratings);
		return $query->execute();
	}

	public function all(){
		$query = $this->db->prepare("SELECT * from rattings");
		$query->execute();
		return $result = $query->fetchAll(PDO::FETCH_ASSOC);
	}
}
