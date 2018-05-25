<?php

include('config/config.php');
include('include/db_query.php');

//primary key will auto increment itself, don't need to add /**
function insertInventoryItem($name, $description, $category) {
	$result = dbQuery("
		INSERT INTO inventory(name, description, category)
		VALUES('$name', '$description', '$category')
	")->fetch();
}

// insertInventoryItem('Grapefruit', 'I like the red kind', 'Produce');
// insertInventoryItem('Turkey Pot Pie', 'They have a gazillion calories', 'Frozen');
// insertInventoryItem('Captian Crunch', 'Lots of sugar', 'Cereal');

function getAllInventoryItems() {
	$result = dbQuery("
		SELECT *
		FROM inventory
	")->fetchAll();

	return $result; //an array of arrays, where each array is an inventory item
}



function getOneInventoryItem($newInventoryID) {
	$result = dbQuery("
		SELECT *
		FROM inventory
		WHERE inventoryID = :inventoryID
	", array(
		'inventoryID'=>$newInventoryID
		))->fetch();

	return $result;
}

// $allInventoryItems = getAllInventoryItems();
//
// echo "<pre>";
// var_dump($allInventoryItems);
// echo "<pre>";

$oneInventoryItem= getOneInventoryItem(2);

echo "<pre>";
var_dump($oneInventoryItem);
echo "<pre>";
