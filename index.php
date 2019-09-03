<?php 

header('Access-Control-Allow-Origin: *');

$cmd = $_REQUEST['cmd'];

if ($cmd == 'signUp') {
	signUpUser();
}

function signUpUser()
{

	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$mobileNo = $_REQUEST['mobileNo'];

	$userSignUpData = array("username"=>$username,"password"=>$password,"mobileNo"=>$mobileNo);
	
	// $allUserSignUpData = array();
	// print_r($allUserSignUpData);
	$myfile = fopen("myfile.json", "r") or die("Unable to open file!");
	// print_r(json_decode(fread($myfile,filesize("myfile.json"))));
	$allUserSignUpData = json_decode(fread($myfile,filesize("myfile.json")));
	fclose($myfile);
	
	// print_r($allUserSignUpData);
	
	array_push($allUserSignUpData, $userSignUpData);
	// print_r($allUserSignUpData);
	$json_allUserSignUpData = json_encode($allUserSignUpData);
	file_put_contents('myfile.json', $json_allUserSignUpData);

	echo json_encode(array("status" => true, "message" => "User sign up successfull..!!"));
	
}

// $posts = array("id"=>5,"name"=>"sagar");
// $newPosts = array();
// array_push($newPosts, $posts);
// array_push($newPosts, $posts);
// $json_data = json_encode($newPosts);
// file_put_contents('myfile.json', $json_data);

// $myfile = fopen("myfile.json", "r") or die("Unable to open file!");
// $data = json_decode(fread($myfile,filesize("myfile.json")));
// echo json_encode($data[0]);
// fclose($myfile);

?> 