<?php

require_once "connection.php";

class CategoriesModel{

	// Add Categories

	static public function AddCategoryModel($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(category) VALUES (:category)");

		$stmt -> bindParam(":category", $data, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return 'ok';

		} else {

			return 'error';

		}
		
		$stmt -> close();

		$stmt = null;
    }

    // Show Categories
    
    static public function ShowCategoriesModel($table, $item, $value){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}
		else{
            
			$stmt = Connection::connect()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

}