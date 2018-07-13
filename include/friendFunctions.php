<?php

function createFriendship($userID1, $userID2){
	$result = dbQuery("
		INSERT INTO friends(userID1, userID2)
		VALUES(:userID1, :userID2),
		(:userID2, :userID1)
	", array(
		'userID1'=>$userID1,
		'userID2'=>$userID2
	))->fetchAll(); //All
}

function deleteFriendship($userID1, $userID2){
	$result = dbQuery("
		DELETE FROM friends
		WHERE (userID1 = :userID1 AND userID2 = :userID2)
		OR (userID1 = :userID2 AND userID2 = :userID1)
		", array(
			'userID1'=>$userID1,
			'userID2'=>$userID2
	))->fetchAll();
}

function getAllThisUsersFriends($userID){
	$result = dbQuery("
	SELECT *
	FROM users
	INNER JOIN friends ON users.userID = friends.userID2
	WHERE friends.userID1 = :userID
	", array(
		'userID'=>$userID
	))->fetchAll();
	return $result;
}

// function doesFriendshipExist($userID1, $userID2){
// 	$result = dbQuery("
// 		SELECT *
// 		FROM friends
// 		WHERE (userID1 = :userID1 AND userID2 = :userID2)
// 		OR (userID2 = :userID1 AND userID1 = :userID2)
// 	", array(
// 		'userID1'=>$userID1,
// 		'userID2'=>$userID2
// 	))->fetchAll();
// 	return $result;
// }

function doesFriendshipExist($userID1, $userID2){
	$result = dbQuery("
		SELECT *
		FROM friends
		WHERE (userID1 = $userID1 AND userID2 = $userID2)
		OR (userID2 = $userID1 AND userID1 = $userID2)
	")->fetchAll();
	return $result;
}



 ?>
