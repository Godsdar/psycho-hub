<?php
	try {
		include "connection.php";
		$conn -> beginTransaction();
		$identifier = $_REQUEST["identifier"];
		$query = "DELETE FROM comments WHERE id=:id";
		$prep = $conn -> prepare($query);
		$prep -> bindParam(":id", $identifier);
		$prep -> execute();

		$conn -> commit();
	}
	catch (PDOException $e) {
		echo "Не удалось подключиться";
		$conn -> rollback();
	}
?>