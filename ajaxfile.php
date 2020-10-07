<?php
include "config.php";

$data = json_decode(file_get_contents("php://input"));

$request = $data->request;

// Fetch All records
if($request == 1){
	$userData = mysqli_query($con,"select * from moms order by id");

	$response = array();
	while($row = mysqli_fetch_assoc($userData)){
	    $response[] = $row;
	}

	echo json_encode($response);
	exit;
}

// Add record
if($request == 2){
	
	$image = $data->image;
	$name = $data->name;
	$price = $data->price;
	$menu = $data->menu;

	$userData = mysqli_query($con,"SELECT * FROM moms WHERE name='".$name."'");
	if(mysqli_num_rows($userData) == 0){
		mysqli_query($con,"INSERT INTO moms (image,name,price,menu) VALUES ('".$image."','".$name."',".$price.",'".$menu."')");
		echo "Add record";
	}else{
		echo "Username already exists.";
	}

	exit;
}

// Update record
if($request == 3){
	$id = $data->id;
	$image = $data->image;
	$name = $data->name;
	$price = $data->price;
	$menu = $data->menu;

	mysqli_query($con,"UPDATE moms SET image='".$image."',name='".$name."',price=".$price.",menu='".$menu."' WHERE id=".$id);
		 
	echo "Update record";
	exit;
}

// Delete record
if($request == 4){
	$id = $data->id;

	mysqli_query($con,"DELETE FROM moms WHERE id=".$id);

	echo "Delete successfully";
	exit;
}
