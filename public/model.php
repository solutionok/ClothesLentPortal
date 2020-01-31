<?php

class rattings
{
	function __construct(){
		global $db;
		$this->db = $db;
	}

	public function add($user, $product, $rating, $rating2, $rating3, $rating4, $rating5, $rating6, $rating7, $rating8){
		$query = $this->db->prepare("INSERT INTO rattings (username, 
			product, 
			delivery_rat,
			time_rat,
			cleanliness_rat,
			accuracy_rat,
			communication_rat,
			quality_rat,
			condition_rat,
			overall_rat
		) VALUES(:a, :b, :r1, :r2, :r3, :r4, :r5, :r6, :r7, :r8)");
		$query->bindParam("a", $user);
		$query->bindParam("b", $product);
		$query->bindParam("r1", $rating);
		$query->bindParam("r2", $rating2);
		$query->bindParam("r3", $rating3);
		$query->bindParam("r4", $rating4);
		$query->bindParam("r5", $rating5);
		$query->bindParam("r6", $rating6);
		$query->bindParam("r7", $rating7);
		$query->bindParam("r8", $rating8);
		return $query->execute();
	}

	public function all(){
		$query = $this->db->prepare("SELECT * from rattings");
		$query->execute();
		return $result = $query->fetchAll(PDO::FETCH_ASSOC);
	}
}
